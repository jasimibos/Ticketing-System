<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\NoticeModel;
use Hash;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = NoticeModel::get();
        return view('pages.notice.notice', compact('notice'));
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
        $notice = new NoticeModel;
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $notice->validation());
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $notice->fill($requested_data)->save();

        return back()->with('message', 'Notice Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        NoticeModel::whereStatus(1)->update(['status' => 0]);
        $notice = NoticeModel::findOrFail($id);
        if ($notice->status == 0) {
            $notice->update(['status' => 1]);
        }
        else {
            $notice->update(['status' => 0]);
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
        $data = NoticeModel::findOrFail($id);
        return view('pages.notice.notice_edit', compact('data'));
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
        $notice = NoticeModel::findOrFail($id);
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $notice->validation());
        if ( $validate->fails() ) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $notice->fill($requested_data)->save();

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
        NoticeModel::findOrFail($id)->delete();
        return back()->with('message', 'Notice Deleted Successfully');
    }
}
