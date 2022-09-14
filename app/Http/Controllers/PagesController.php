<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Song;
use App\Models\SongTag;
use App\Models\About;
use App\Models\DrumKitLoop;
use App\Models\Producer;
use App\Models\Spotlight;
use App\Models\Membership;
use App\Models\WebSetting;
use Auth;
use DB;

class PagesController extends Controller
{
    /**
     * Load main site index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::with('drum_kit_loops')->take(10)->with('song_tags')->orderBy('id', 'DESC')->get();
        $drum_kit_loops = DrumKitLoop::take(5)->get();
        $services = Service::get();
        $spotlights = Spotlight::get();
        $membership = Membership::select('first_image','second_image')->first();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');

        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->whatsapp();

        return view('pages.index', compact('songs','drum_kit_loops','banner','spotlights','membership','services','logo','shareComponent'));
    }

    public function about()
    {
        $abouts=About::get();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.about',compact('abouts','banner','logo'));
    }

    public function faqs()
    {
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.faqs',compact('banner','logo'));
    }

    public function contact()
    {
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.contact',compact('banner','logo'));
    }

    public function privacy_policy()
    {
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.privacy_policy',compact('banner','logo'));
    }

    public function terms_condition()
    {
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.terms-condition',compact('banner','logo'));
    }

    public function services()
    {
        $services = Service::get();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.services.index', compact('services','banner','logo'));
    }

    public function all_spotlights()
    {
        $spotlights = Spotlight::get();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.all_spotlight', compact('spotlights','banner','logo'));
    }
    

    public function search_songs(Request $request)
    {
        $search = $request->input('search');
  
        if($request->type=="1"){
        $songs = Song::query()
                    ->orwhere('title', 'LIKE', "%{$search}%")
                    ->orderBy('id', 'DESC')
                    ->get();
        }            
        elseif($request->type=="2"){
        $song_id = SongTag::query()
                    ->select('song_id')
                    ->orwhere('tags', 'LIKE', "%{$search}%")
                    ->get();
        $songs=Song::whereIn('id',$song_id)->orderBy('id', 'DESC')->get(); 
        }
        else{
        $producer_id = Producer::query()
                        ->orwhere('name', 'LIKE', "%{$search}%")
                        ->get();   
        $songs=Song::whereIn('producer_id',$producer_id)->orderBy('id', 'DESC')->get();            
        }
      
        
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.all_tracks', compact('songs','banner','logo'));
    }
    
    public function all_songs(Request $request)
    {
        $search = $request->input('search');
  
        $songs = Song::query()
                    ->orwhere('title', 'LIKE', "%{$search}%")
                    ->orderBy('id', 'DESC')
                    ->get();
        
        
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.all_tracks', compact('songs','banner','logo'));
    }

    public function tags_songs($tag)
    {
        // Get Songs related to tag
        $song_id=SongTag::select('song_id')->where('tags',$tag)->get();
        $songs = Song::whereIn('id',$song_id)->with('drum_kit_loops')->with('producers')->orderBy('id', 'DESC')->get();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
        return view('pages.tags_songs', compact('songs','banner','logo','tag'));
    }

    public function beat($beat_id)
    {
        // Get Specific Song
        $song = Song::where('id',$beat_id)->with('drum_kit_loops')->with('producers')->first();
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');

        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->whatsapp(); 
        
        return view('pages.song', compact('song','banner','logo','shareComponent'));
    }

    public function specific_drum_kit_loop($id)
    {
        $drum_kit_loop = DrumKitLoop::where('id',$id)->first();
        $songs = Song::where('album_id',$id)->get(); 
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');

        $user_id=Auth::id();
        
        $drum_loop_status=DB::table('user_drum_kits_loops')->where('user_id',$user_id)->where('drum_kits_loops_id',$id)->first();
       
        return view('pages.specific_drum_kit_loop', compact('songs','drum_kit_loop','banner','logo','drum_loop_status'));
    }
}

