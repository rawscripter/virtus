<?php
namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use App\Models\CommunicationType;
use App\Models\ContactStage;
use App\Models\LeadFollowUpType;
use App\Models\LeadStatus;
use App\Models\LeadTemperature;
use App\Models\OccupancyType;
use App\Models\OfferAcceptedType;
use App\Models\OfferMadeType;
use Illuminate\Http\Request;


use App\Models\Lead;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{

    public function getLeadEnums() {

        Log::info('get values');
        $lead = new Lead();
        Log::info($lead->defaultEnumValues());
        return $lead->defaultEnumValues();
    }

    public function addLead(){

    }

    public function addLeadStatusTypes(Request $request){
        $data =LeadStatus::updateOrCreate(['status_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadContactStageTypes(Request $request){
        Log::info($request->all());
        $data =ContactStage::updateOrCreate(['stages_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadTemperatureTypes(Request $request){
        $data =LeadTemperature::updateOrCreate(['temperature_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadFollowUpTypes(Request $request){
        $data =LeadFollowUpType::updateOrCreate(['lead_followup_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadOccupancyTypes(Request $request){
        $data =OccupancyType::updateOrCreate(['occupancy_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadOfferMadeTypes(Request $request){
        $data =OfferMadeType::updateOrCreate(['offer_made_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addLeadOfferAcceptedTypes(Request $request) {
        $data =OfferAcceptedType::updateOrCreate(['offer_accepted_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

    public function addCommunicationTypes(Request $request) {
        $data =CommunicationType::updateOrCreate(['communication_type'=> $request['type']]);
        return response(['data'=>$data]);
    }

}
