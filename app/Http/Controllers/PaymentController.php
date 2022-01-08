<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\PaymentModel;
use App\User;
use Hash;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selected_year = isset($request->year) ? $request->year : date('Y');  
        $pay_all = PaymentModel::orderBy('year', 'DESC')->get();
        $payment = collect($pay_all)->where('year', $selected_year);
        $year = $pay_all->pluck('year')->unique();
        
        $client = User::whereYear('created_at', isset($request->year) ? $request->year : date('Y'))
                        ->whereRole(2)
                        ->get();             
        return view('pages.payment.payment', compact('payment','client','year','selected_year'));
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
        $payment_status = PaymentModel::where('client_id', $request->client_id)
                                        ->where('month', $request->month)
                                        ->where('year', $request->year)->first();

        if ($payment_status) {
            $payment_status->delete();
        }
        else {
            $payment = new PaymentModel;
            $requested_data = $request->all();
            $validate = Validator::make($request->all(),$payment->validation());
            if ( $validate->fails() ) {
                return back()->withInput()->withErrors($validate->errors());
            }

            $requested_data['status'] = 1;
            $payment->fill($requested_data)->save();
        }
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = PaymentModel::findOrFail($id);
        if ($payment->status == 0) {
           $payment->update(['status' => 1]);
        }
        else {
           $payment->update(['status' => 0]);
        }
        return back()->with('message', 'Notice Status Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = PaymentModel::where('client_id',$id)->orderBy('year', 'DESC')->get()->toArray();
        $client = User::findOrFail($id);
        return view('pages.payment.client_wise_payment', compact('payment','client'));
    }

    public function payment_report()
    {
        $id = auth()->user()->id;
        $payment = PaymentModel::where('client_id',$id)->get()->toArray();
        $client = User::findOrFail($id);
        return view('pages.payment.client_wise_payment', compact('payment','client'));
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
       $payment = PaymentModel::findOrFail($id);
        $requested_data = $request->all();
        $validate = Validator::make($request->all(),$payment->validation());
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

       $payment->fill($requested_data)->save();

        return redirect('/notice')->with('message', 'Notice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentModel::findOrFail($id)->delete();
        return back()->with('message', 'Notice Deleted Successfully');
    }
}
