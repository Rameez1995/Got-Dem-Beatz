<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\About;


class AboutUSController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $abouts = About::all();

    return view('dashboard.admin.about.index', compact('abouts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.admin.about.add');
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
      'heading' => 'required|string',
    ]);

    
    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/aboutus';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore = 'no_img.jpg';
    }

    $data = [
      'heading' => $valid['heading'],
      'desc' => $request->desc,
      'image' => $fileNameToStore
    ];

    // Save data into db
    $abouts = About::create($data);

    if ($abouts) {
      return redirect('/admin/abouts')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/abouts')->with('error', 'Record not created!');
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
    $about = About::findOrFail($id);

    return view('dashboard.admin.about.edit', compact('about'));
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
      'heading' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/aboutus';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore
      ];

      // Delete previous file
      $about = About::where('id', $id)->first();
      Storage::delete('public/aboutus/' . $about->image);
    }

    $data = [
      'heading' => $valid['heading'],
      'desc' => $request->desc
    ];

    if ($request->hasFile('image')) {
      $data = array_merge($data1, $data);
    } else {
      $data = $data;
    }

    // Update data into db
    $about = About::find($id);
    $about = $about->update($data);

    if ($about) {
      return redirect('/admin/abouts')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/abouts')->with('error', 'Record not updated!');
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
    $about = About::destroy($id);

    if ($about) {
      return redirect('/admin/abouts')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/abouts')->with('error', "Record not deleted!");
    }
  }
}
