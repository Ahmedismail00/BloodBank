<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = DonationRequest::paginate(20);
        return view('donationRequests.index',compact('records'));
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
        $model = DonationRequest::findorfail($id);
        return view('donationRequests.edit',compact('model'));
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
            'patient_name' =>'required',
            'patient_phone' =>'required',
            'hospital_name' =>'required',
            'patient_age' =>'required',
            'bags_num' =>'required|max:10',
            'hospital_address' =>'required'
        ];
        $messages = [
            'patient_name.required' => 'Name is required',
            'patient_phone.required' => 'Phone is required',
            'hospital_name.required' => 'Hospital Name is required',
            'patient_age.required' => 'Age is required',
            'bags_num.required' => 'Bags Number is required',
            'hospital_address.required' => 'Hospital Address is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = DonationRequest::findorfail($id);
        $record->update($request->all());
        flash()->success('Updated');
        return redirect(route('donationRequests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = DonationRequest::findorfail($id);
        $record->delete();
        flash()->success('Deletd');
        return redirect(route('donationRequests.index'));
    }
}
