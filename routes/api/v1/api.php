<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/users')->group(function () {
    Route::post('user/login', 'api\v1\auth\AuthController@login')->name('api.login');
    Route::post('user/register', 'api\v1\auth\AuthController@register')->name('api.register');
    Route::middleware('auth:api')->group(function () {
        Route::get('/user', 'api\v1\user\UserController@index')->name('api.user');
        Route::get('/users', 'api\v1\user\UserController@getUsers');
    });
});

Route::prefix('/file')->group(function (){
    Route::post('/upload/create', 'api\v1\forms\FileUploadController@create')->name('api.upload_file');
});

Route::prefix('/inquiry')->group(function () {

    /** Contact Messages **/
    Route::post('/contact/create', 'api\v1\forms\ContactMessageController@create')->name('api.create_contact_message');

    Route::middleware('auth:api')->get('/contact', 'api\v1\forms\ContactMessageController@index');
    Route::middleware('auth:api')->get('/contact/trash', 'api\v1\forms\ContactMessageController@trash');
    Route::middleware('auth:api')->get('/contact/read/{id}', 'api\v1\forms\ContactMessageController@read');
    Route::middleware('auth:api')->delete('/contact/delete/{id}', 'api\v1\forms\ContactMessageController@delete');

    /** Property Offer Inquiry **/
    Route::post('/offer/create', 'api\v1\forms\SellPropertyInquiryController@create')->name('api.sell_property_inquiry_offer');

    Route::middleware('auth:api')->get('/offer', 'api\v1\forms\SellPropertyInquiryController@index');
    Route::middleware('auth:api')->get('/offer/trash', 'api\v1\forms\SellPropertyInquiryController@trash');
    Route::middleware('auth:api')->get('/offer/read/{id}', 'api\v1\forms\SellPropertyInquiryController@read');
    Route::middleware('auth:api')->delete('/offer/delete/{id}', 'api\v1\forms\SellPropertyInquiryController@delete');

    /** Property JV Inquiry **/
    Route::post('/jv/create', 'api\v1\forms\JointVentureController@create')->name('api.jv_property_inquiry_offer');

    Route::middleware('auth:api')->get('/jv', 'api\v1\forms\JointVentureController@index');
    Route::middleware('auth:api')->get('/jv/trash', 'api\v1\forms\JointVentureController@trash');
    Route::middleware('auth:api')->get('/jv/read/{id}', 'api\v1\forms\JointVentureController@read');
    Route::middleware('auth:api')->delete('/jv/delete/{id}', 'api\v1\forms\JointVentureController@delete');
});

Route::prefix('/leads')->group(function (){

    Route::get('/type/getLeadStatuses', 'api\v1\LeadController@getLeadStatuses')->name('get_lead_statuses');

    Route::post('/type/status', 'api\v1\LeadController@addLeadStatusTypes')->name('create_status_type');
    Route::post('/type/stage', 'api\v1\LeadController@addLeadContactStageTypes')->name('create_stage_type');
    Route::post('/type/temperature', 'api\v1\LeadController@addLeadTemperatureTypes')->name('create_temperature_type');
    Route::post('/type/followUp', 'api\v1\LeadController@addLeadFollowUpTypes')->name('create_follow_up_type');
    Route::post('/type/occupancy', 'api\v1\LeadController@addLeadOccupancyTypes')->name('create_occupancy_type');
    Route::post('/type/offerMade', 'api\v1\LeadController@addLeadOfferMadeTypes')->name('create_offer_made_type');
    Route::post('/type/offerAccepted', 'api\v1\LeadController@addLeadOfferAcceptedTypes')->name('create_offer_accepted_type');
    Route::post('/type/communication', 'api\v1\LeadController@addCommunicationTypes')->name('create_communication_type');

});

Route::prefix('/campaign')->group(function (){
    Route::post('/create', 'api\v1\CampaignController@create')->name('create_campaign');
    Route::post('/type/create', 'api\v1\CampaignController@createCampaignType')->name('create_campaign_type');
    Route::get('/all', 'api\v1\CampaignController@index')->name('get_campaigns');
    Route::get('/recent', 'api\v1\CampaignController@recent')->name('get_recent_campaigns');
    Route::get('/contact/search/id', 'api\v1\CampaignController@searchCampaignById')->name('search_contact_by_id');
    Route::get('/contacts/search/campaign', 'api\v1\CampaignController@searchByCampaign')->name('search_contacts_by_campaign');
    Route::get('/contacts/search/owner', 'api\v1\CampaignController@searchByOwner')->name('search_campaign_contacts_owner');
    Route::get('/contacts/search/address', 'api\v1\CampaignController@searchByAddress')->name('search_campaign_contacts_address');
    Route::get('/types/all', 'api\v1\CampaignController@getCampaignTypes')->name('get_campaign_types');
    Route::get('/list', 'api\v1\CampaignController@list')->name('get_campaigns_list');
    //   Route::get('/{campaign}', 'api\v1\CampaignController@getCampaign')->name('get_campaign');
});



\Illuminate\Support\Facades\Broadcast::routes();
