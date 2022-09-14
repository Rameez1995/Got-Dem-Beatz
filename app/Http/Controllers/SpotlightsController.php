<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Spotlight;
use App\Models\WebSetting;

class SpotlightsController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $spotlights = Spotlight::get();
    return view('dashboard.admin.spotlights.index', compact('spotlights'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.admin.spotlights.add');
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
      'name' => 'required|string',
      'image' => 'required|image',
    ]);

    if ($request->hasFile('image')) {
      // Save file to folder
      $loc = '/public/spotlights';
      $fileData = $request->file('image');
      $fileNameToStore1 = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore1 = 'no_img.jpg';
    }


    $data = [
      'name' => $valid['name'],
    //   'desc' => $request->desc,
      'image' => $fileNameToStore1
    //   'status' => $valid['status']
    ];

    // Save data into db
    $spotlight = Spotlight::create($data);

    if ($spotlight) {
      return redirect('/admin/spotlights')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/spotlights')->with('error', 'Record not created!');
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
    $spotlight = Spotlight::findOrFail($id);

    return view('dashboard.admin.spotlights.edit', compact('spotlight'));
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
        'name' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/spotlights';
      $fileData = $request->file('image');
      $fileNameToStore1 = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore1
      ];

      // Delete previous file
      $spotlight = Spotlight::where('id', $id)->first();
      Storage::delete('public/spotlights/' . $spotlight->image);
    }


    $data = [
        'name' => $valid['name'],
        // 'desc' => $request->desc,
        // 'image' => $fileNameToStore1
        // 'status' => $valid['status']
    ];

    if ($request->hasFile('image')) {
      $data = array_merge($data1, $data);
    } else {
      $data = $data;
    }

    // Update data into db
    $spotlight = Spotlight::find($id);
    $spotlight = $spotlight->update($data);

    if ($spotlight) {
      return redirect('/admin/spotlights')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/spotlights')->with('error', 'Record not updated!');
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
    $spotlight = Spotlight::destroy($id);

    if ($spotlight) {
      return redirect('/admin/spotlights')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/spotlights')->with('error', "Record not deleted!");
    }
  }

}
