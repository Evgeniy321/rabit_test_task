<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

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
        $agent = new Agent();
        $data = $request->validate([
            'text' => 'string|required',
            'name' => 'string|required',
            'email' => 'email|required',

        ]);
        //dd($request->getClientIp(), $agent->browser());
        $user = User::firstOrCreate([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'ip' => $request->getClientIp(),
            'browser' => $agent->browser()
        ]);
        $message = Message::create([
            'text' => $data['text'],
            'user_id' => $user->id
        ]);
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
