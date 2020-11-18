<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function sign_in()
    {
        return view('Front.sign_in');
    }
    public function sign_up()
    {
        return view('Front.sign_up');
    }
    public function sign_up_save(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:clients',
            'last_donation_date' => 'required',
            'd_o_b' => 'required',
            'email' =>'required|unique:clients',
            'city_id'=>'required|exists:cities'
        ];
        $messages = [
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'city_id.required' => 'يجب عليك اختيار مدينة'
        ];
        $this->validate($request,$rules,$messages);
        $client = Client::create($request->all());
        $client->bloodType()->sync($request->blood_type_id);
        $governorate_id = City::where('id',$request->city_id)->pluck('governorate_id');
        $client->governorate()->sync($governorate_id);
        $client->api_token = Str::random(60);
        $client->save();
        return view('Front.sign_in');

    }
    public function sign_in_save( Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|exists:clients'
        ],[
            'phone.exists'=> 'هذا الهاتف غير مسجل'
        ]);
        if (Auth::guard('client')->attempt(['phone' => $request->phone, 'password' => $request->password]))
        {
            return redirect()->intended(route('home_page'));
        }
        if (Client::where('phone',$request->phone)->where('password','!=',$request->password)){
            flash('كلمة المرور خاطئة');
        }

        return redirect()->back()->withInput($request->only('phone'));
    }
    public function sign_out()
    {
        Auth::guard('client')->logout();
        return redirect(route('home_page'));
    }

}
