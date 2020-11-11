<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Role::paginate(20);
        return view('roles.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' =>'required|unique:roles',
            'permission_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = Role::create(['name'=>$request->name]);
        $record->permissions()->attach($request->permission_list);
        flash()->success('Added sucssefully');
        return redirect(route('roles.index'));


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
        $model = Role::findorfail($id);
        return view('roles.edit',compact('model'));
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
            'name' =>'required|unique:roles,name,'.$id,
            'permission_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = Role::findorfail($id);
        $record->update($request->all());
        $record->permissions()->sync($request->permission_list);
        flash()->success('Updated');
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Role::findorfail($id);
        $record->delete();
        flash()->success('Deleted');
        return redirect(route('roles.index'));
    }
}
