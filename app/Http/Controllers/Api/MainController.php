<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Token;

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
    public function donation_requests()
    {
        $donation_request = DonationRequest::all();
        return ResponseJson(1,'success',$donation_request);
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

    public function create_donation_request(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'hospital_name' => 'required',
            'patient_age' => 'required',
            'bags_num' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11'
        ]);
        if($validator->fails()){
            return responseJson(0 , 'unsuccessful' , $validator->errors()->all());
        }
        $donation_request = $request->user()->donationRequest()->Create($request->all());
        $clientIds = $donation_request->city->governorate->clients()
            ->whereHas('bloodType',function($q) use ($request){
            $q->where('blood_types.id',$request->blood_type_id);
        })->pluck('clients.id')->toArray();
        if (count($clientIds))
        {
            $notification = $donation_request->notifications()->create([
                'title'=>  'احتاج متبرع ',
                'content'=> $donation_request->bloodType->name . ' محتاج متبرع لفصيلة',
                'client_id' => $request->client_id
            ]);
            $notification->clients()->attach($clientIds);

            // get token for FCM (push notification using firebasse cloud)
            $tokens = Token::whereIn('client_id',$clientIds)->where('token','!=','')->whereIn('client_id');

        }
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

    public function post_favourite(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'post_id' => 'required|exists:posts,id'
        ]);
        if($validation->fails()){
            return responseJson(0,$validation->errors()->first());
        }
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return responseJson(1 , 'loaded' , $toggle);
    }

    public function favourites_posts(Request $request)
    {
        $posts = $request->user()->favourites()->latest()->paginate(20);
        return responseJson(1 , 'loaded' , $posts);
    }

    public function settings()
    {
        $settings = Setting::all();
        return ResponseJson(1,'success',$settings);
    }
}
