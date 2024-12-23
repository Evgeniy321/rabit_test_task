<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::paginate(5);
        return view("messages.index",compact("messages"));
    }
    public function create(){
        return view("messages.create");
    }
    public function store(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'text' => 'string|required',

        ]);
        $message = Message::create($data);
        if(isset($user)){
            $message->user_id = $user->id;
        }else{
            $message->user_id = 1;
        }
        
        return redirect()->route('index');

    }
    public function delete(){
        $messages = Message::paginate(5);
        return view('messages.delete', compact("messages"));
    }

    public function destory(Message $message){
        $message->delete();
        return redirect()->route('index');
    }
}
