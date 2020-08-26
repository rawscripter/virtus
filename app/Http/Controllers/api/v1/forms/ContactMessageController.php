<?php


namespace App\Http\Controllers\api\v1\forms;

use App\Http\Resources\ContactMessage as ContactMessageResource;
use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use http\Client\Request;

class ContactMessageController
{
    public function index(){
        return ContactMessageResource::collection(ContactMessage::all()->sortDesc());
    }

    public function create(ContactMessageRequest $request){
        $message= ContactMessage::create([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message'],
        ]);

        return response(['data'=>$message]);
    }

    public function read($id){
        if(ContactMessage::find($id)) {
            ContactMessage::where('id', $id)->update(['new' => true]);
        }
        return new ContactMessageResource(ContactMessage::find($id));
    }

    public function delete($id){
        if(ContactMessage::find($id)) {
            $message = ContactMessage::find($id)->delete();
            return response(['data' => $message]);
        }

    }

    public function trash(){
        return ContactMessageResource::collection(ContactMessage::onlyTrashed()->get());
    }

}
