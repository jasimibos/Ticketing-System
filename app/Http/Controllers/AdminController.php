<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\ClientLicenseModel;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::whereRole(1)->select('id','name', 'email', 'phone', 'address', 'role', 'status')->withCount('license')->get();
        return view('pages.admin.admin', compact('admin'));
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
        $client = new User;
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $client->admin_validation());
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $requested_data['role'] = 1;
        $requested_data['password'] = Hash::make($request->password);
        $client->fill($requested_data)->save();

        return back()->with('message', 'Admin Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::findOrFail($id);
        if ($client->status == 0) {
            $client->update(['status' => 1]);
        }
        else {
            $client->update(['status' => 0]);
        }
        return back()->with('message', 'Admin Status Changed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.admin_edit', compact('data'));
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
        $client = User::findOrFail($id);
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $client->admin_validation($id));
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $client->fill($requested_data)->save();

        return back()->with('message', 'Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('message', 'Admin Deleted Successfully');
    }
}
