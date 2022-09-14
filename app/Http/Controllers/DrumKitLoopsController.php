<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\DrumKitLoop;
use Auth;
use DB;
use App\Models\Song;


class DrumKitLoopsController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $drum_kit_loops = DrumKitLoop::get();

    return view('dashboard.admin.drum_kit_loops.index', compact('drum_kit_loops'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $genres = Category::all();
    return view('dashboard.admin.drum_kit_loops.add', compact('genres'));
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
      'status' => 'required',
    ]);

    
    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/drum_kit_loops';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore = 'no_img.jpg';
    }

    if ($request->hasFile('file')) {
      // Save file to folder
      $loc1 = '/public/drum_kit_loops/file';
      $fileData1 = $request->file('file');
      $zip_file = $this->uploadImage($fileData1, $loc1);
    } else {
      $zip_file = 'no_img.jpg';
    }

    $data = [
      // 'genre_id' => $valid['genre'],
      'title' => $valid['title'],
      'desc' => $request->desc,
      'strikethrough_price' => $request->strikethrough_price,
      'price' => $request->price,
      'type' => $request->type,
      'image' => $fileNameToStore,
      'file' => $zip_file,
      'status' => $valid['status']
    ];
    

    // Save data into db
    $drum_loop_kit = DrumKitLoop::create($data);

    if ($drum_loop_kit) {
      return redirect('/admin/drum_kits_loops')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/drum_kits_loops')->with('error', 'Record not created!');
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

  public function my_drum_kits_loops()
  {
    $user_id = Auth::id(); 

    $drum_kit_loops = DB::table('user_drum_kits_loops')
            ->join('drum_kit_loops', 'drum_kit_loops.id', '=', 'user_drum_kits_loops.drum_kits_loops_id')
            ->select('drum_kit_loops.*')
            ->get();

    return view('dashboard.front.my_drum_kits_loops', compact('drum_kit_loops'));
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

    $genres = Category::all();

    $drum_loop_kit = DrumKitLoop::findOrFail($id);

    return view('dashboard.admin.drum_kit_loops.edit', compact('drum_loop_kit','genres'));
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
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/drum_kit_loops';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore
      ];

      // Delete previous file
      $drum_loop_kit = DrumKitLoop::where('id', $id)->first();
      Storage::delete('public/drum_kit_loops/' . $drum_loop_kit->image);
    }

    if ($request->hasFile('file')) {
      // Save file to folder
      $loc = '/public/drum_kit_loops';
      $fileData1 = $request->file('file');
      $zip_file = $this->uploadImage($fileData1, $loc);
      $data2 = [
        'file' => $zip_file
      ];

      // Delete previous file
      $drum_loop_kit = DrumKitLoop::where('id', $id)->first();
      Storage::delete('public/drum_kit_loops/' . $drum_loop_kit->file);
    }

    $data = [
      // 'genre_id' => $valid['genre'],
      'title' => $valid['title'],
      'desc' => $request->desc,
      'price' => $request->price,
      'strikethrough_price' => $request->strikethrough_price,
      'price' => $request->price,
      'type' => $request->type,
      'status' => $valid['status']
    ];

    if ($request->hasFile('image') || $request->hasFile('file') ) {
      $data = array_merge($data1, $data);
    } elseif($request->hasFile('file') ) {
      $data = array_merge($data2, $data);
    } elseif($request->hasFile('image') && $request->hasFile('file') ){
      $data = array_merge($data2, $data1, $data);
    } else{
      $data = $data;
    }

    // Update data into db
    $drum_loop_kit = DrumKitLoop::find($id);
    $drum_loop_kit = $drum_loop_kit->update($data);

    if ($drum_loop_kit) {
      return redirect('/admin/drum_kits_loops')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/drum_kits_loops')->with('error', 'Record not updated!');
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
    $drum_loop_kit = DrumKitLoop::destroy($id);

    if ($drum_loop_kit) {
      return redirect('/admin/drum_kits_loops')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/drum_kits_loops')->with('error', "Record not deleted!");
    }
  }
}
