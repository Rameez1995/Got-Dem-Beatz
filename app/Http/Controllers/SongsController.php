<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Song;
use App\Models\DrumKitLoop;
use App\Models\WebSetting;
use App\Models\User_song;
use App\Models\SongTag;
use DB;
use Illuminate\Support\Facades\Auth;

class SongsController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $songs = Song::with('drum_kit_loops')->with('producers')->orderBy('id', 'DESC')->get();
    $banner=WebSetting::value('banner');
    $logo=WebSetting::value('logo');
    return view('dashboard.admin.songs.index', compact('songs','banner','logo'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $drum_kit_loops = DrumKitLoop::all();
    $producers=DB::table('producers')->get();
    return view('dashboard.admin.songs.add', compact('drum_kit_loops','producers'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function uploadImage($fileData, $loc)
  {
    // Get file name with extension
    $fileNameWithExt = $fileData->getClientOriginalName();
    // Get just file name
    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    // Get just extension
    $fileExtension = $fileData->extension();
    // File name to store
    $fileNameToStore = time() . '.' . $fileExtension;
    // Finally Upload Image
    $fileData->storeAs($loc, $fileNameToStore);

    return $fileNameToStore;
  }

  public function store(Request $request)
  {
    // Validate data
    $valid = $this->validate($request, [
      'title' => 'required|string',
      'image' => 'required|image',
      'price' => 'required|string',
      'song_file' => 'required',
      'status' => 'required',
      'min' => 'required',
      'sec' => 'required',
      'producer_id' => 'required',
    ]);

    if ($request->hasFile('song_file')) {
      // Save file to folder
      $loc = '/public/songs';
      $fileData = $request->file('song_file');
      $fileNameToStore1 = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore1 = 'no_img.jpg';
    }

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/songs';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore = 'no_img.jpg';
    }

    $data = [
      'title' => $valid['title'],
      'desc' => $request->desc,
      'price' => $request->price,
      'lyrics' => $request->lyrics,
      'min' => $request->min,
      'sec' => $request->sec,
      'producer_id' => $request->producer_id,
      'bpm' => $request->bpm,
      'image' => $fileNameToStore,
      'song_file' => $fileNameToStore1,
      'status' => $valid['status']
    ];
    
  

    $songs = Song::create($data);
    
   
    if(isset($request->tags)){
    foreach ($request->tags as $tag) {
      $song_tag = new SongTag();
      $song_tag->song_id = $songs->id;
      $song_tag->tags = $tag;
      $song_tag->save();
      }  
    }

    if ($songs) {
      return redirect('/admin/songs')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/songs')->with('error', 'Record not created!');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function show(Page $page)
  {
    //
  }

  

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // Get single page details
    $song = Song::findOrFail($id);

    $drum_kit_loops = DrumKitLoop::all();
    
    $selected_tags2=SongTag::where('song_id', $id)->get();
    
    $producers=DB::table('producers')->get();
    $selected_producer_id=DB::table('songs')->where('id',$id)->value('producer_id');
     
    $selected_tags=array();
    foreach($selected_tags2 as $selected_tags1)
    {
        array_push($selected_tags, $selected_tags1->tags);
    }

  
    

    return view('dashboard.admin.songs.edit', compact('song','drum_kit_loops','selected_tags','producers','selected_producer_id'));
  }

  public function my_songs()
  {
    $user_id = Auth::id(); 

    $user_songs=User_song::select('song_id')->where('user_id',$user_id)->get();
    $songs=Song::whereIn('id',$user_songs)->get();

    return view('dashboard.front.songs.my_songs', compact('songs'));
  }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function membership()
  {
    return view('dashboard.front.membership');
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Validate data
    $valid = $this->validate($request, [
      'title' => 'required|string',
      'price' => 'required|string',
      'status' => 'required',
      'min' => 'required',
      'sec' => 'required',
      'producer_id' => 'required',
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/songs';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore
      ];

      // Delete previous file
      $song = Song::where('id', $id)->first();
      Storage::delete('public/songs/' . $song->image);
    }


      if ($request->hasFile('song_file')) {
        // Save song file to folder
        $loc = '/public/songs';
        $fileData1 = $request->file('song_file');
        $fileNameToStore1 = $this->uploadImage($fileData1, $loc);
        $data2 = [
          'song_file' => $fileNameToStore1
        ];

      // Delete previous file
      $song = Song::where('id', $id)->first();
      Storage::delete('public/songs/' . $song->song_file);
    }

    $data = [
      'title' => $valid['title'],
      'desc' => $request->desc,
      'bpm' => $request->bpm,
      'producer_id' => $request->producer_id,
      'min' => $request->min,
      'sec' => $request->sec,
      'price' => $request->price,
      'lyrics' => $request->lyrics,
      'status' => $valid['status']
    ];

    if ($request->hasFile('image') && $request->hasFile('song_file') ) {
      $data = array_merge($data1, $data2, $data);
    } else {
      $data = $data;
    }

    // Update data into db
    $song = Song::find($id);
    $song = $song->update($data);
    
    SongTag::where('song_id', $id)->delete();
    
    if(isset($request->tags))
    {
      foreach ($request->tags as $tag) 
      {
        $song_tag = new SongTag();
        $song_tag->song_id = $id;
        $song_tag->tags = $tag;
        $song_tag->save();
      }
    }

    if ($song) {
      return redirect('/admin/songs')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/songs')->with('error', 'Record not updated!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // Delete page
    $song = Song::destroy($id);

    if ($song) {
      return redirect('/admin/songs')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/songs')->with('error', "Record not deleted!");
    }
  }

  /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
      $banner=WebSetting::value('banner');
      $logo=WebSetting::value('logo');
      $carts = session()->get('cart');
        return view('pages.cart',compact('banner','logo'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        
        $song = Song::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } 
        else{
            $cart[$id] = [
                "id" => $song->id,
                "name" => $song->title,
                "song_file" => $song->song_file,
                "type" => "Beat",
                "quantity" => 1,
                "price" => $song->price,
                "image" => $song->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Beat added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cartupdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Beat removed successfully');
        }
    }
}
