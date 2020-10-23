<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DonationRequest;

class MainController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();
        return ResponseJson(1,'success',$governorates);
    }
    public function cities(Request $request)
    {
        $cities = City::where(function($query) use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id' , $request->governorate_id);
            }
        })->get();
        return ResponseJson(1,'success',$cities);
    }
    public function posts()
    {
        $posts = Post::all();
        return ResponseJson(1,'success',$posts);
    }
    public function blood_types()
    {
        $blood_types = BloodType::all();
        return ResponseJson(1,'success',$blood_types);
    }
    public function categories()
    {
        $categories = Category::all();
        return ResponseJson(1,'success',$categories);
    }
    public function donation_requests(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'hospital_name' => 'required',
            'patient_age' => 'required',
            'bags_num' => 'required',
        ]);
        if($validator->fails()){
            return responseJson(0 , 'unsuccessful' , $validator->errors()->all());
        }
        $donation_request = DonationRequest::Create($request->all());
        $donation_request->save();
        return ResponseJson(1,'success',$donation_request);
    }
    public function contact(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' =>'required',
            'phone' => 'required',
        ]);
        if($validator->fails()){
            return responseJson(0 , 'unsuccessful' , $validator->errors()->all());
        }
        $contact = Contact::Create($request->all());
        $contact->save();
        return responseJson('1','success' , $contact);
    }

    public function postFavourites(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'post_id' => 'required|exists:posts,id'
        ]);

        if($validation->fails()){
            return responseJson(0,$validation->errors()->first());
        }

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',$toggle);


    }


}
