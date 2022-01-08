<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\ClientLicenseModel;
use Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = User::whereRole(2)->select('id','name', 'email','owner_name', 'phone', 'address','reg_no', 'amount_per_month', 'role', 'status')->withCount('license')->get();
        return view('pages.client.client', compact('client'));
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
        $validate = Validator::make($request->all(), $client->client_validation());
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $make_sl_no = User::where('role',2)->count();

        $make_sl_no_code = (int) $make_sl_no + 1;

        if (strlen($make_sl_no) == 1) {
            $reg_no = '000'.$make_sl_no_code;
        }
        if (strlen($make_sl_no) == 2) {
            $reg_no = '00'.$make_sl_no_code;
        }
        if (strlen($make_sl_no) == 3) {
            $reg_no = '0'.$make_sl_no_code;
        }

        $requested_data['reg_no'] = $reg_no;
        $requested_data['role'] = 2;
        $requested_data['password'] = Hash::make($request->password);
        $client->fill($requested_data)->save();

        if(count($request->license_name) > 0 && count($request->license_name) == count($request->license_address)){
            foreach($request->license_name as $key => $value){
                $license = new ClientLicenseModel;
                $license->client_id = $client->id;
                $license->name = $value;
                $license->address = $request->license_address[$key];
                $license->save();
            }
        }

        return back()->with('message', 'Client Added Successfully');
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
        return back()->with('message', 'Client Status Changed');
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
        return view('pages.client.client_edit', compact('data'));
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
        $validate = Validator::make($request->all(), $client->client_validation($id));
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $client->fill($requested_data)->save();

        return back()->with('message', 'Client Updated Successfully');
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
        return back()->with('message', 'Client Added Successfully');
    }


    public function clientLicense($id) {
        $data = User::findOrFail($id);
        $client = ClientLicenseModel::where('client_id', $id)->get();
        return view('pages.client.client_license', compact('client', 'data'));
    }


    public function clientLicenseAdd(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $id = $request->input('id');
        $client = ClientLicenseModel::query()->firstOrNew(['id' => $id]);
        $client->fill($request->all())->save();

        return back()->with('message', 'License Added Successfully');
    }

    public function clientLicenseStatus($id) {
        $client = ClientLicenseModel::findOrFail($id);
        if ($client->status == 0) {
            $client->status = 1;
        }
        else {
            $client->status = 0;
        }
        $client->save();
        return back()->with('message', 'Client License Status Successfully');
    }

    public function changePassword() {
        return view('pages.change_password');
    }

    public function UpdatePassword(Request $request) {
        $data = User::findOrFail( auth()->user()->id );
        $validate = Validator::make($request->all(), $data->change_password());

        if( $validate->fails() ){
            return back()->withInput()->withErrors($validate->errors());
        }

        if ( \Hash::check($request->old_password , auth()->user()->password )) {
            if ( !\Hash::check($request->password , auth()->user()->password )) {
                $request->user()->fill([
                    'password' => Hash::make($request->password)
                ])->save();

                return back()->with('message','Password Updated Successfully');;
            }
            else {
                return back()->with('error','New Password Can not be the old password!');
            }
        }
        else {
            return back()->with('error',"Old Password does'nt matched ");
        }
    }

    public function profile_view() {
        $data = User::with('license')->findOrFail(auth()->user()->id);
        return view('pages.profile', compact('data'));
    }
}
