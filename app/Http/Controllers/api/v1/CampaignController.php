<?php

namespace App\Http\Controllers\api\v1;

use App\Events\SearchEvent;
use App\Http\Resources\CampaignListResource;
use App\Http\Resources\MarketListResource;
use App\Http\Resources\PropertyAddressResource;
use App\Http\Resources\OwnerResource;
use App\Models\Market;
use App\Models\PropertyAddress;
use App\Models\Campaign;
use App\Models\Owner;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Builder;
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

    public function markets()
    {
        $market = MarketListResource::collection(Market::all())->response();
        return $market;
    }

    public function recent()
    {
        $results = Owner::orderBy('updated_at')->paginate(10);
        Log::info($results);
        return OwnerResource::collection($results);
    }


    public function getCampaignTypes()
    {
        return response(Campaign::all());
    }


    public function searchByCampaign(Request $request)
    {
        $queryStr = $request->query('query');
        $perPage = $request->query('perPage');
        $page = $request->query('page');


        $campaignContact = Owner::whereHas('campaigns', function (Builder $query) use ($queryStr) {
            $query->where('name', 'like', '%' . $queryStr . '%');

        })
            ->paginate($perPage)
            ->appends($page);
        return OwnerResource::collection($campaignContact);
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
        $market =$request['market'];
        $campaign = Campaign::where('id', $incomingCampaign['id'])->get();
        DB::transaction(function () use ($unique, $campaign, $market) {

            $unique->each(function ($contact) use ($campaign, $market) {
                $required_keys = array('first_name','last_name','mailing_address','mailing_city','mailing_state','mailing_zip',
                    'property_address','property_city','property_state','property_zip',
                    'phone1','phone1_type', 'phone1_tag',
                    'phone2','phone2_type','phone2_tag',
                    'phone3','phone3_type','phone3_tag',
                    'phone4','phone4_type','phone4_tag',
                    'phone5','phone5_type','phone5_tag',
                    'phone6','phone6_type','phone6_tag',
                    'email');

                foreach ($required_keys as $possibleKey){
                    if (!array_key_exists($possibleKey, $contact)) {
                        $contact[$possibleKey]= 'None Provided';
                    }
                }
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
                $property =  PropertyAddress::firstOrCreate([
                            'property_address' => $contact['property_address'],
                            'property_city' => $contact['property_city'],
                            'property_state' => $contact['property_state'],
                            'property_zip' => $contact['property_zip'],
                        ]));
                Log::info($market);
                $property->markets()->syncWithoutDetaching(
                  Market::firstOrCreate([
                      'market' => $market['name'],
                  ])
                );

                $owner->phones()->syncWithoutDetaching(
                    Phone::firstOrCreate([
                            'phone1' => $contact['phone1'],
                            'phone1_type' => $contact['phone1_type'],
                            'phone1_tag' => $contact['phone1_type'],
                            'phone2' => $contact['phone2'],
                            'phone2_type' => $contact['phone2_type'],
                            'phone2_tag' => $contact['phone1_tag'],
                            'phone3' => $contact['phone3'],
                            'phone3_type' => $contact['phone3_type'],
                            'phone3_tag' => $contact['phone1_type'],
                            'phone4' => $contact['phone4'],
                            'phone4_type' => $contact['phone4_type'],
                            'phone4_tag' => $contact['phone1_type'],
                            'phone5' => $contact['phone5'],
                            'phone5_type' => $contact['phone5_type'],
                            'phone5_tag' => $contact['phone1_type'],
                            'phone6' => $contact['phone6'],
                            'phone6_type' => $contact['phone6_type'],
                            'phone6_tag' => $contact['phone6_tag'],
                        ]
                    ));
                $owner->save();
                DB::commit();
            });
        }, 1);
    }


    public function createCampaignType(Request $request) {
        Log::info($request['campaignType']);
        $campaign =Campaign::updateOrCreate(['name'=> $request['campaignType']]);
        return response(['data'=>$campaign]);
    }


    public function createMarket(Request $request) {
        Log::info($request['campaignType']);
        $market =Market::updateOrCreate(['market'=> $request['market']]);
        return response(['data'=>$market]);
    }

    public function list(Request $request) {
        return  ['test->test'];
    }
}
