<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\WebSetting;
use App\Models\Membership;
use DB;
use Illuminate\Support\Facades\Auth;

class Membershipcontroller extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function view_membership()
  {
    // Get all pages
     $banner=WebSetting::value('banner');
     $logo=WebSetting::value('logo');
     return view('pages.membership',compact('banner','logo'));
  }
  
  public function index()
  {
    // Get all pages
    $membership = Membership::first();
    $banner=WebSetting::value('banner');
    $logo=WebSetting::value('logo');
    return view('dashboard.admin.membership.index', compact('membership','banner','logo'));
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
    $membership = Membership::findOrFail($id);
    return view('dashboard.admin.membership.edit', compact('membership'));
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

    if ($request->hasFile('first_image')) {
      // Save image to folder
      $loc = '/public/membership/first_image';
      $fileData = $request->file('first_image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
      $data1 = [
        'first_image' => $fileNameToStore
      ];

      // Delete previous file
      $membership = Membership::where('id', $id)->first();
      Storage::delete('public/membership/' . $membership->first_image);
    }


      if ($request->hasFile('second_image')) {
        // Save song file to folder
        $loc = '/public/membership/second_image';
        $fileData1 = $request->file('second_image');
        $fileNameToStore1 = $this->uploadImage($fileData1, $loc);
        $data2 = [
          'second_image' => $fileNameToStore1
        ];

      // Delete previous file
      $membership = Membership::where('id', $id)->first();
      Storage::delete('public/membership/' . $membership->second_image);
    }
    
    if ($request->hasFile('first_image') && $request->hasFile('second_image') ) {
      $data = array_merge($data1, $data2);
      $membership = Membership::find($id);
      $membership = $membership->update($data);
    }
    else if ($request->hasFile('first_image')) {
      $data = $data1;
      $membership = Membership::find($id);
      $membership = $membership->update($data);
    }
    else if ($request->hasFile('second_image') ) {
      $data = $data2;
      $membership = Membership::find($id);
      $membership = $membership->update($data);
    }
    else {
        $membership="No Data Updated";
    }

    if ($membership) {
      return redirect('/admin/membership')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/membership')->with('error', 'Record not updated!');
    }
  }

}
