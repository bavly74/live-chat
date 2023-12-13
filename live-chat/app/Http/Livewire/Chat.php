<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{

    public $messageText;
    public $receiverId;

    public function render()
    {

        $users=User::orderBy('last_seen','DESC')->get();
//        $messages = Message::where('to',$this->receiverId)->where('from',auth()->user()->id)->latest()->take(10)->get()->sortBy('id');
        $messages = Message::where(function ($query) {
            $query->where('to', $this->receiverId)
                ->where('from', auth()->user()->id);
        })->orWhere(function ($query) {
            $query->where('to', auth()->user()->id)
                ->where('from', $this->receiverId);
        })->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat', compact('messages','users'));
    }

    public function sendMessage()
    {
        Message::create([
            'from' => auth()->user()->id,
            'message' => $this->messageText,
            'to'=>$this->receiverId
        ]);

        $this->reset('messageText');
    }

}
