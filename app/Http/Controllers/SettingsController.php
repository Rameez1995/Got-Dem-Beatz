<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Card;

class SettingsController extends Controller
{
    public function index()
    {
      //* Get Settings Page *//
      return view('dashboard.front.settings.index');
    }

    public function get_password()
    {
      //* Get Update Password Page *// 
      return view('dashboard.front.settings.update_password.index');
    }

    public function change_password(Request $request,$id)
    {
    
    //* Update Password *// 

    $request->validate([
      'current_password' => ['required', new MatchOldPassword],
      'new_password' => ['required'],
      'confirm_password' => ['same:new_password'],
  ]);

  $user=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

  if ($user) {
    return redirect('/user/settings/change_password')->with('success', 'Record updated successfully.');
  } else {
    return redirect('/user/settings/change_password')->with('error', 'Record not updated!');
  }

  }

  public function edit_profile()
  {
      //* Get Edit Profile Page *// 
      return view('dashboard.front.settings.update_profile.index');
  }

  public function update_profile(Request $request,$id)
  {
    
     // Validate data
     $valid = $this->validate($request, [
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'email' => 'required|string|email'
    ]);
    
    $data = [
      'first_name' => $valid['first_name'],
      'last_name' => $valid['last_name'],
      'email' => $valid['email'],
      'contact_no' => $request->contact_no,
      'address' => $request->address,
      'city' => $request->city,
      'state' => $request->state,
      'zip' => $request->zip
    ];
    
    // Update data into db
    $user = User::find($id);
    $user = $user->update($data);

    if ($user) {
      return redirect('/user/settings/edit_profile')->with('success', 'Record updated successfully.');
    } else {
      return redirect('/user/settings/edit_profile')->with('error', 'Record not updated!');
    }
  }

  public function cards()
  {
      // Get all cards
      $cards = Card::get();
      return view('dashboard.front.settings.card.index',compact('cards'));
  }

  public function get_card()
  {
      // Get all cards
      //$cards = Card::get();
      return view('dashboard.front.settings.card.add');
  }

  public function store_card(Request $request)
  {
    // Validate data
    $valid = $this->validate($request, [
      'name' => 'required|string',
      'number' => 'required|string',
      'exp_date' => 'required',
      'cvc' => 'required',
    ]);

    $user_id=Auth::id();

    $data = [
      'name' => $valid['name'],
      'user_id' => $user_id,
      'number' => $valid['number'],
      'exp_date' => $valid['exp_date'],
      'cvc' => $valid['cvc'],
    ];

    // Save data into db
    $cards = Card::create($data);

    if ($cards) {
      return redirect('/user/settings/payment_method/add_card')->with('success', 'Record created successfully.');
    } else {
      return redirect('/user/settings/payment_method/add_card')->with('error', 'Record not created!');
    }
  }

  public function edit_card($id)
  {
    // Get all cards
    $card = Card::find($id);
    return view('dashboard.front.settings.card.edit',compact('card'));
  }

  public function update_card(Request $request)
  {
    
     // Validate data
     $valid = $this->validate($request, [
      'name' => 'required|string',
      'number' => 'required|string',
      'exp_date' => 'required|string',
      'cvc' => 'required|string'
    ]);

    $data = [
      'name' => $valid['name'],
      'number' => $valid['number'],
      'exp_date' => $valid['exp_date'],
      'cvc' => $valid['cvc']
    ];
    
    // Update data into db
    $card = Card::find($request->id);
    $card = $card->update($data);

    if ($card) {
      return redirect('/user/settings/payment_method/edit_card/'.$request->id)->with('success', 'Record updated successfully.');
    } else {
      return redirect('/user/settings/payment_method/edit_card/'.$request->id)->with('error', 'Record not updated!');
    }
  }

  
}
