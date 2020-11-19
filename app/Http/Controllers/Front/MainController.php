<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function home()
    {
        $posts = Post::take(9)->get();
        $donation_requests = DonationRequest::paginate(4);
        $blood_types = BloodType::get()->all();
        $cities = City::get()->all();
        $settings = Setting::get()->first();
        return view('Front.index',compact('posts','donation_requests','blood_types','settings','cities'));
    }
    public function donation_requests()
    {
        $donation_requests = DonationRequest::paginate(2);

        return view('Front.donation-requests',compact('donation_requests'));
    }
    public function about_us()
    {
        $settings = Setting::get()->first();
        return view('Front.who-are-us',compact('settings'));
    }
    public function contact_us(Request $request)
    {
        return view('Front.contact-us');
    }
    public function contact_us_send(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' =>'required',
            'phone' => 'required',
        ];
        $this->validate($request,$rules);
        $contact = Contact::Create($request->all());
        $contact->save();
        flash()->success('Added');
        return view('Front.contact-us');
    }
    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return responseJson(1 , 'success',$toggle);
    }
    public function donations_search(Request $request)
    {
        $donation_requests = DonationRequest::where('blood_type_id',$request->get('blood_type_id'))
            ->where('city_id',$request->get('city_id'))->paginate(2);

        return view('Front.donation-requests',compact('donation_requests'));
    }
    public function make_donation_request(Request $request)
    {
        return view('Front.make_donation_request');
    }
    public function send_donation_request(Request $request)
    {
        $rules = [
            'patient_name' => 'required',

        ];
        $this->validate($request,$rules);
        $donation_request = $request->user()->donationRequest()->Create($request->all());
        $donation_request->save();
        $donation_requests = DonationRequest::paginate(20);
        return redirect(route('donation_requests',compact('donation_requests')));
    }
    public function article_details(Request $request,$id )
    {
        $article = Post::findOrFail($id);
        $posts = Post::all();
        return view('Front.article-details',compact('article','posts'));
    }
    public function inside_request (Request $request,$id )
    {
        $donation_request = DonationRequest::findOrFail($id);
        return view('Front.inside-request',compact('donation_request'));
    }


}
