<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class ContactController extends Controller
{
    public function contacts(){
        try{
            $messages = Contact::where('isDeleted', 0)->paginate(15);
            return view('back.contacts', compact('messages'));
        }catch (\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function getMessage(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        try{
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'receive_at'=>now(),
            ]);
            toastr()->success('Your message was successfully sent.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
        }
        return redirect()->back();
    }

    public function deleteMessage(Request $request)
    {
        try {
            $message = Contact::where('id',$request->id)->get()[0];
            $message->isDeleted = 1;
            $message->deleted_at = now();
            $message->save();
            toastr()->success('The message was deleted successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong!');
        }
            return redirect()->back();
    }
}
