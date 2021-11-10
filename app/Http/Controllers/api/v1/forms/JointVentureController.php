<?php


namespace App\Http\Controllers\api\v1\forms;

use App\Http\Requests\Inquiry;
use App\Http\Resources\Inquiry as JointVentureResource;
use App\Models\JointVenture;
use Illuminate\Support\Facades\Log;

class JointVentureController
{
    public function index(){
        return JointVentureResource::collection(JointVenture::all());
    }

    public function create(Inquiry $request){
        Log::debug($request['firstName']);
        $message= JointVenture::create([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'company' => $request['company'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'condition' => $request['condition'],
            'selling_price' => $request['price'],
        ]);

        return response(['data'=>$message]);
    }

    public function read($id){
        if(JointVenture::find($id)) {
            JointVenture::where('id', $id)->update(['new' => true]);
        }
        return new JointVentureResource(JointVenture::find($id));
    }

    public function delete($id){
        if(JointVenture::find($id)) {
            $message = JointVenture::find($id)->delete();
            return response(['data' => $message]);
        }

    }

    public function trash(){
        return JointVentureResource::collection(JointVenture::onlyTrashed()->get());
    }

}
