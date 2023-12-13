<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('last_seen','DESC')->where('id','!=',auth()->user()->id)->get();
        return view('dashboard',compact('users'));
    }

   public function chat($receiverId){

       return view('chat',compact('receiverId'));
   }

   public function deleteChat(){
        Message::truncate();
        return redirect()->back();
   }
}
