<?php


namespace App\Http\Controllers\api\v1\forms;

use App\Http\Requests\Inquiry;
use App\Http\Requests\SellPropertyInquiryRequest;
use App\Http\Resources\SellPropertyInquiry as SellPropertyInquiryResource;
use App\Models\SellPropertyInquiry;

class SellPropertyInquiryController
{
    public function index(){
        return SellPropertyInquiryResource::collection(SellPropertyInquiry::all());
    }

    public function create(Inquiry $request){
        $message= SellPropertyInquiry::create([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'condition' => $request['condition'],
            'asking_price' => $request['price'],
        ]);

        return response(['data'=>$message]);
    }

    public function read($id){
        if(SellPropertyInquiry::find($id)) {
            SellPropertyInquiry::where('id', $id)->update(['new' => true]);
        }
        return new SellPropertyInquiryResource(SellPropertyInquiry::find($id));
    }

    public function delete($id){
        if(SellPropertyInquiry::find($id)) {
            $message = SellPropertyInquiry::find($id)->delete();
            return response(['data' => $message]);
        }

    }

    public function trash(){
        return SellPropertyInquiryResource::collection(SellPropertyInquiry::onlyTrashed()->get());
    }

}
