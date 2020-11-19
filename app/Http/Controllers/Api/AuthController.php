<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\City;
use App\Models\BloodType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\reset_password;
use App\Token;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:clients',
            'last_donation_date' => 'required',
            'd_o_b' => 'required',
            'email' =>'required|unique:clients'
        ]);
        if($validator->fails()){
            return responseJson(0,'validator error',$validator->errors()->all());
        }
        $client = Client::create($request->all());
        $client->bloodType()->sync($request->blood_type_id);
        $governorate_id = City::where('id',$request->city_id)->pluck('governorate_id');
        $client->governorate()->sync($governorate_id);
        $client->api_token = Str::random(60);
        $client->save();
        return responseJson(1,'done',[
            'api_token'=>$client->api_token,
            'client' => $client
        ]);
    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'phone' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0,'validator error',$validator->errors()->first());
        }
        $client = Client::where('phone',$request->phone)->first();
        if ($client) {
            if (Hash::check($request->password,$client->password)) {            // password validate
                return responseJson(1,'login successful',[
                    'api_token' =>$client->api_token,
                    'client' => $client
                ]);
            }else{
                return responseJson(1,'login data is not correct');
            }
        }else {
            return responseJson(1,'login unsuccessful');
        }
        // $auth = auth()->guard('api')->validate($request->all());
    }

    public function reset_password(Request $request)
    {
        $validataion = validator()->make($request->all(),[
            'phone' => 'required',
        ]);

        if ($validataion->fails()) {
            return responseJson( 0 , $validataion->errors()->first());
        }

        $user = Client::where('phone',$request->phone)->first();
        if($user){
            $code = rand(1111,999);
            $update = $user->update(['pin_code' => $code]);

            if($update)
            {
                //smsMisr($request->phone,'ur request code is '.$code);       // sms

                 Mail::to($user->email)
                ->bcc('ahmed.ismail11199@gmail.com')
                ->send(new ResetPassword($code));  // mail

                return responseJson(1 , 'check ur phone' ,
                 [
                     'pin_code_for_test' => $code,
                     'mail_fails' => Mail::failures()
                 ]);
            }else
            {
                return responseJson('0' , 'try again');
            }
        }else {
            return responseJson('0' , 'wrong pgone number please try again');
        }
    }

    public function password(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'pin_code' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($validation->fails()) {
            return responseJson(0,$validation->errors()->first());
        }

        $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();

        if($user)
        {
            $user->password = $request->password;
            $user->pin_code = null;

            if($user->save())
            {
                return responseJson(1,'password changed successfully');
            }else{
                return responseJson(0 , 'please try again');
            }
        }else{
            return responseJson(0 , 'pin code error ');
        }
    }

    public function edit_profile(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'phone' => Rule::unique('clients')->ignore($request->user()->id),
            'email' => Rule::unique('clients')->ignore($request->user()->id),
        ]);
        if($validator->fails())
        {
            return responseJson(0,'validator error',$validator->errors()->first());
        }
        $loginUser = $request->user();
        $loginUser->update($request->all());
        $loginUser->save();
        if($request->has('governorate_id'))
        {
              $loginUser->cities()->sync($request->city_id);
        }
        if($request->has('blood_type'))
        {
            $bloodType = BloodType::where('name',$request->blood_type)->first();
            $bloodType->bloodType()->sync($request->blood_type);
        }
        return responseJson(1,'successfull',[
            'api_token'=>$request->user()->api_token,
            'user' => $loginUser
            ]);
    }

    public function register_token(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'token' => 'required',
            'platform' => 'required|in:android,ios'
        ]);
        if($validation->fails()){
            return responseJson(0 , $validation->errors()->first());
        }
        Token::where('token',$request->token)->delete();
        $request->user()->token()->create($request->all());
        return responseJson(1 , 'success');
    }

    public function remove_token(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'token' => 'required'
        ]);
        if($validation->fails()){
            return responseJson(0 , $validation->errors()->first());
        }
        Token::where('token',$request->token)->delete();
        return responseJson(1 , 'success');
    }

}
