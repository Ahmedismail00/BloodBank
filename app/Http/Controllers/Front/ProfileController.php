<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Client::findorfail($id)->first();

        return view('Front.profile',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'phone' => Rule::unique('clients')->ignore($id),
            'email' => Rule::unique('clients')->ignore($id),
            'password' =>'required|confirmed|min:8',
            'password_confirmation'=>'required',
            'last_donation_date' => 'required',
            'd_o_b' => 'required',
            'city_id'=>'required'
        ];
        $messages = [
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'city_id.required' => 'يجب عليك اختيار مدينة'
        ];
        $this->validate($request,$rules,$messages);
        $request->merge(['password'=>bcrypt($request->password)]);
        $record = Client::findorfail($id);
        $record->update($request->all());
        flash()->success('Updated');
        return redirect(route('home_page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
