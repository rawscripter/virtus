<?php

namespace App\Http\Controllers\api\v1;

use App\Events\SearchEvent;
use App\Http\Resources\CampaignListResource;
use App\Http\Resources\PropertyAddressResource;
use App\Http\Resources\CampaignResource;
use App\Http\Resources\OwnerResource;
use App\Models\PropertyAddress;
use App\Models\Campaign;
use App\Models\Owner;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CampaignController extends Controller
{


    public function index()
    {
        return CampaignListResource::collection(Campaign::all())->response();
    }

    public function recent()
    {
        $results = Owner::orderBy('updated_at')->get();
        Log::info($results);
       return OwnerResource::collection($results);
    }


    public function getCampaignTypes()
    {
        return response(Campaign::all());
    }

    public function searchByOwner(Request $request)
    {
        $query = $request->query('query');
        $perPage = $request->query('perPage');
        $page = $request->query('page');

        $campaignContact = Owner::where('first_name', 'like', '%' . $query . '%')
            ->orWhere('last_name', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends($page);
        //    event(new SearchEvent($campaignContact));

        return OwnerResource::collection($campaignContact);
    }



    public function searchByAddress(Request $request)
    {
        $query = $request->query('query');
        $perPage = $request->query('perPage');
        $page = $request->query('page');

        $campaignContact = PropertyAddress::where('property_address', 'like', '%' . $query . '%')
            ->orWhere('property_city', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends($page);
        //    event(new SearchEvent($campaignContact));


        return PropertyAddressResource::collection($campaignContact);
    }


    public function searchCampaignById(Request $request)
    {
        $query = $request->query('id');

        $campaignContact = Campaign::where('id', $query)->get();

        return response(['data'=>$campaignContact[0]]);
    }



    public function create(Request $request) {
        $collection = collect($request['csv'] );
        $unique = $collection->unique();
        $incomingCampaign =$request['campaign'];

        $campaign = Campaign::where('id', $incomingCampaign['id'])->get();
        DB::transaction(function () use ($unique, $campaign) {
            $unique->each(function ($contact) use ($campaign) {
                $owner = Owner::firstOrCreate([
                    'first_name' => $contact['first_name'],
                    'last_name' => $contact['last_name'],
                    'mailing_address' => $contact['mailing_address'],
                    'mailing_city' => $contact['mailing_city'],
                    'mailing_state' => $contact['mailing_state'],
                    'mailing_zip' => $contact['mailing_zip'],
                ]);
                $owner->campaigns()->syncWithoutDetaching($campaign);
                $owner->propertyAddresses()->syncWithoutDetaching(
                    PropertyAddress::firstOrCreate([
                            'property_address' => $contact['property_address'],
                            'property_city' => $contact['property_city'],
                            'property_state' => $contact['property_state'],
                            'property_zip' => $contact['property_zip'],
                        ]
                    ));
                $owner->phones()->syncWithoutDetaching(
                    Phone::firstOrCreate([
                            'phone1' => $contact['phone1'],
                            'phone1_type' => $contact['phone1_type'],
                            'phone2' => $contact['phone2'],
                            'phone2_type' => $contact['phone2_type'],
                            'phone3' => $contact['phone3'],
                            'phone3_type' => $contact['phone3_type'],
                            'phone4' => $contact['phone4'],
                            'phone4_type' => $contact['phone4_type'],
                            'phone5' => $contact['phone5'],
                            'phone5_type' => $contact['phone5_type'],
                            'phone6' => $contact['phone6'],
                            'phone6_type' => $contact['phone6_type'],
                        ]
                    ));
                $owner->save();
            });
        }, 1);
    }


    public function createCampaignType(Request $request) {
        Log::info($request['campaignType']);
        $campaign =Campaign::updateOrCreate(['name'=> $request['campaignType']]);
        return response(['data'=>$campaign]);
    }

    public function list(Request $request) {
        return  ['test->test'];
    }
}
