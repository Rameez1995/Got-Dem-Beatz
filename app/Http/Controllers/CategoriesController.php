<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;


class CategoriesController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all pages
    $categories = Category::all();

    return view('dashboard.admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.admin.categories.add');
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
      'status' => 'required',
    ]);

    
    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/categories';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
    } else {
      $fileNameToStore = 'no_img.jpg';
    }

    $data = [
      'name' => $valid['name'],
      'desc' => $request->desc,
      'image' => $fileNameToStore,
      'status' => $valid['status']
    ];

    // Save data into db
    $categories = Category::create($data);

    if ($categories) {
      return redirect('/admin/categories')->with('success', 'Record created successfully.');
    } else {
      return redirect('/admin/categories')->with('error', 'Record not created!');
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
    $category = Category::findOrFail($id);

    return view('dashboard.admin.categories.edit', compact('category'));
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
      'image' => 'required|image',
      'status' => 'required',
    ]);

    if ($request->hasFile('image')) {
      // Save image to folder
      $loc = '/public/categories';
      $fileData = $request->file('image');
      $fileNameToStore = $this->uploadImage($fileData, $loc);
      $data1 = [
        'image' => $fileNameToStore
      ];

      // Delete previous file
      $category = Category::where('id', $id)->first();
      Storage::delete('public/categories/' . $category->image);
    }

    $data = [
      'name' => $valid['name'],
      'desc' => $request->desc,
      'status' => $valid['status']
    ];

    if ($request->hasFile('image')) {
      $data = array_merge($data1, $data);
    } else {
      $data = $data;
    }

    // Update data into db
    $category = Category::find($id);
    $category = $category->update($data);

    if ($category) {
      return redirect('/admin/categories')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/admin/categories')->with('error', 'Record not updated!');
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
    $category = Category::destroy($id);

    if ($category) {
      return redirect('/admin/categories')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect('/admin/categories')->with('error', "Record not deleted!");
    }
  }
}
