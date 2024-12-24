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
    public function index(Request $request){
        $allowedColumns = ['name', 'email', 'created_at'];
        $allowedDirections = ['asc', 'desc']; 
        
        $sortColumn = in_array($request->input('sort_by'), $allowedColumns) 
                    ? $request->input('sort_by') 
                    : 'created_at';

        $sortDirection = in_array($request->input('sort_dir'), $allowedDirections) 
                        ? $request->input('sort_dir') 
                        : 'asc';
        if($sortColumn == 'created_at'){
            $messages = Message::orderBy($sortColumn, $sortDirection)->paginate(5);
        }else{
            $messages = Message::join('users', 'messages.user_id', '=', 'users.id')
                    ->orderBy('users.'.$sortColumn, $sortDirection)
                    ->select('messages.*') 
                    ->paginate(5);
        }
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
