<?php
namespace App\Http\Controllers\api\v1\auth;


use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use CloudCreativity\LaravelJsonApi\Document\Error;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController
{
    public function login(Request $request) {
        $login = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($login)) {
            $user = User::where('username', $login['username'])->first();
            $user['full_name']= $user->first_name. ' '. $user->last_name;
            if ($user) {
                return $this->getToken($login, $user);
            } else {
                return response(['status' => 'error', 'message' => 'UserResource not found'], 401);
            }
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }


    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' =>$request['password'],
        ]);

        $login = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if($user) {
            return $this->getToken($login, $user);
        }else{
            return response(['status'=>'error', 'message'=> 'Something Went Wrong During Registration']);
        }
    }


    private function getToken($login, $user)
    {
        Log::info(config('passport.client_secret'));
        Log::info($user['email']);
        try {
            $http = new Client();
            $response = $http->post(route('passport.token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('passport.client_id'),
                    'client_secret' => config('passport.client_secret'),
                    'username' => $user['email'],
                    'password' => $login['password'],
                    'scope' => '',
                ],
            ]);
            $tokenData = json_decode((string)$response->getBody(), true);
            $tokenData['user'] = $user;
            return $tokenData;
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents());
            return response([
                'title' => 'Bad Request',
                'detail' => $error->message,
                'status' => '400',
            ]);
        }
    }
}
