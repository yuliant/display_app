<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use App\Events\PodcastProcessed;

class UserController extends Controller
{
    Public function index(){
        $users = User::all();
        $title = "Data Users";
        return view('user.index', compact('users','title'));
    }
    public function show(string $id){
        $title = "Detail Users";
        $user = User::findOrFail($id);
        return view('user.show',compact('user','title'));
    }
    public function edit(string $id){
        $title = "Edit Users";
        $user = User::findOrFail($id);
        return view('user.edit',compact('user','title'));
    }
    public function update(Request $request, string $id){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'status' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->update($validatedData);
        event(new PodcastProcessed('success'));
        return redirect()->route('users.data')->with('success', 'Employee updated successfully.');                
    }
    public function create(){
        $title = "Form Users";
        return view('user.create',compact('title'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'role' => 'required',
            'status' => 'required',
            'password' => ['required', Password::min(6)]           
        ]);
        User::create($validatedData);
        event(new PodcastProcessed('success'));
        return redirect()->route('users.data')->with('success', 'User added successfully.');        
    }
}
