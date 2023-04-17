<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Song;
use App\Models\Service;
use App\Models\DrumKitLoop;
use App\Models\WebSetting;

class ServicesController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $services = Service::get();
    return view('dashboard.admin.services.index', compact('services'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.admin.services.add');
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
      'desc' => 'required',
      'status' => 'required',
    ]);

    if ($request->hasFile('image')) {
      // Save file to folder
      $loc = '/public/services';
      $fileData = $request->file('image');
      $fileNameToStore1 = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore1 = 'no_img.jpg';
    }


    $data = [
      'name' => $valid['name'],
      'desc' => $request->desc,
      'image' => $fileNameToStore1,
      'status' => $valid['status']
    ];

    // Save data into db
    $services = Service::create($data);

    if ($services) {
      return redirect('/admin/services')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/services')->with('error', 'Record not created!');
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
    $service = Service::findOrFail($id);

    return view('dashboard.admin.services.edit', compact('service'));
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
        'desc' => 'required',
        'status' => 'required',
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/services';
      $fileData = $request->file('image');
      $fileNameToStore1 = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore1
      ];

      // Delete previous file
      $service = Service::where('id', $id)->first();
      Storage::delete('public/services/' . $service->image);
    }


    $data = [
        'name' => $valid['name'],
        'desc' => $request->desc,
        'image' => $fileNameToStore1,
        'status' => $valid['status']
    ];

    if ($request->hasFile('image')) {
      $data = array_merge($data1, $data);
    } else {
      $data = $data;
    }

    // Update data into db
    $service = Service::find($id);
    $service = $service->update($data);

    if ($service) {
      return redirect('/admin/services')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/services')->with('error', 'Record not updated!');
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
    $service = Service::destroy($id);

    if ($service) {
      return redirect('/admin/services')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/services')->with('error', "Record not deleted!");
    }
  }

  public function custom_beat()
  {
    // Get custom beat service page
    $banner=WebSetting::value('banner');
    $logo=WebSetting::value('logo');
    return view('pages.services.custom_beat',compact('banner','logo'));
  }

  public function drum_kits_loops()
  {
    // Get drum kits service page
    $drum_kit_loops = DrumKitLoop::orderBy('id', 'DESC')->get();
    $banner=WebSetting::value('banner');
    $logo=WebSetting::value('logo');
    return view('pages.services.drum_kits_loops',compact('drum_kit_loops','banner','logo'));
  }

  public function mix_mastering()
  {
    // Get mix mastering service page
    $banner=WebSetting::value('banner');
    $logo=WebSetting::value('logo');
    return view('pages.services.mix_mastering',compact('banner','logo'));
  }
  
}
