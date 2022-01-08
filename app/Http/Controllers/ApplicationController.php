<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EmploymentAgrementModel;
use App\ApplicationModel;
use App\Models\ClientLicenseModel;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Validator;
use Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $make_sl_no = ApplicationModel::where('client_id', auth()->user()->id)->latest()->first();
        // $year = date('y');
        // $month = date('m');

        // if (strlen(date('d')) == 1) {
        //     $date = '0'.date('d');
        // }
        // else {
        //     $date = date('d');
        // }

        // if (!empty($make_sl_no)) {
        //     $reg_id = (int) $make_sl_no->id + 1;

        //     if (strlen($reg_id) == 1){
        //         $reg_id = '00'.$reg_id;

        //     }

        //     if (strlen($reg_id) == 2){
        //         $reg_id = '00'.$reg_id;
        //     }

        //     if (strlen($reg_id) == 3){
        //         $reg_id = '0'.$reg_id;
        //     }

        //     $make_sl_no_code = $year . $month . $date . auth()->user()->id . $reg_id;
        // }
        // else {
        //     $reg_id = 0001;
        //     $make_sl_no_code = $year . $month . $date . auth()->user()->id . $reg_id;
        // }

        $license = ClientLicenseModel::where('client_id', Auth::user()->id)->get();
        $application = ApplicationModel::where('client_id', Auth::user()->id)
                                        ->where(function($query) use($request){
                                            if($request->gender) {
                                                $query->where('sex', $request->gender);
                                            }
                                            if($request->license) {
                                                $query->where('business_address', $request->license);
                                            }
                                            if($request->marital_status) {
                                                $query->where('marital_status', $request->marital_status);
                                            }
                                            if($request->search) {
                                                $query->where('name',  'like', '%' . $request->search . '%')
                                                        ->orWhere('sl_no',  'like', '%' . $request->search . '%')
                                                        ->orWhere('profession',  'like', '%' . $request->search . '%')
                                                        ->orWhere('passport_no', $request->search)
                                                        ->orWhere('visa_no', $request->search)
                                                        ->orWhere('mofa_no', $request->search);
                                            }
                                        })->with('applicationLicense')
                                            ->paginate(isset($request->per_page) ? $request->per_page : 100);

        $request = $request->all();

        $emp_agrement = EmploymentAgrementModel::findOrFail(1);
        return view('pages.application.application', compact('application','license','emp_agrement', 'request'));
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
        $application = new ApplicationModel;
        $emp_agr = new EmploymentAgrementModel;

        $emp_validate = Validator::make($request->all(), $emp_agr->validation());
        $app_validate = Validator::make($request->all(), $application->validation());

        if ( $emp_validate->fails() || $app_validate->fails()) {
            $errors = array_merge_recursive($emp_validate->errors()->toArray(), $app_validate->errors()->toArray());

            return back()->withInput()->withErrors($errors);
        }

        if (isset($request->sl_no)){
            $sl_error = ApplicationModel::where('client_id', auth()->user()->id)->where('sl_no', $request->sl_no)->first();
            if ($sl_error)
                return back()->withInput()->withErrors(['sl_no' => [0 => 'The sl no already exists']]);
        }

        $application->client_id = auth()->user()->id;
        $application->fill($request->all())->save();

        $emp_agr->application_id = $application->id;
        $emp_agr->fill($request->all())->save();

        if ($request->type_id == 3) {
            $license = ClientLicenseModel::findOrFail($request->business_address);
            return view('pages.application.application_print', compact('request','license'));
        }
        return back()->with('message', 'Application Added Successfully');
    }

    public function print(Request $request) {
        $application = new ApplicationModel;
        $emp_agr = new EmploymentAgrementModel;

        $emp_validate = Validator::make($request->all(), $emp_agr->validation());
        $app_validate = Validator::make($request->all(), $application->validation());

        if ( $emp_validate->fails() || $app_validate->fails()) {
            $errors = array_merge_recursive($emp_validate->errors()->toArray(), $app_validate->errors()->toArray());
            return back()->withInput()->withErrors($errors);
        }

        $license = ClientLicenseModel::findOrFail($request->business_address);

        return view('pages.application.application_print', compact('request', 'license'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = ApplicationModel::with('applicationLicense')
                                        ->findOrFail($id);

        $emp_agr = EmploymentAgrementModel::where('application_id',$application->id)
                    ->select('employement_agrement.id as emp_agr_id', 'employement_agrement.*')
                    ->first();

        $data = array_merge_recursive($application->toArray(), $emp_agr->toArray());

        return view('pages.application.application_details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = ApplicationModel::findOrFail($id);
        $emp_agr = EmploymentAgrementModel::where('application_id',$application->id)->select('employement_agrement.id as emp_agr_id', 'employement_agrement.*')->first();
        $license = ClientLicenseModel::where('client_id', Auth::user()->id)->get();

        $data = array_merge_recursive($application->toArray(), $emp_agr->toArray());

        return view('pages.application.application_edit', compact('data', 'license'));
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
        $application = ApplicationModel::findOrFail($id);
        $emp_agr = EmploymentAgrementModel::findOrFail($request->emp_agr_id);

        $emp_validate = Validator::make($request->all(), $emp_agr->validation());
        $app_validate = Validator::make($request->all(), $application->validation($id));

        if ( $emp_validate->fails() || $app_validate->fails()) {
            $errors = array_merge_recursive($emp_validate->errors()->toArray(), $app_validate->errors()->toArray());
            return back()->withInput()->withErrors($errors);
        }

        if (isset($request->sl_no)) {
            $sl_error = ApplicationModel::where('client_id', auth()->user()->id)
                                            ->where('sl_no', $request->sl_no)
                                            ->first();

            if ($sl_error && $sl_error->id != $id)
                return back()->withInput()->withErrors(['sl_no' => [0 => 'The sl no already exists']]);
        }

        $application->fill($request->all());
        $application->client_id = auth()->user()->id;
        $application->save();

        $emp_agr->fill($request->all());
        $emp_agr->application_id = $application->id;
        $emp_agr->save();

        return back()->with('message', 'Application Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = ApplicationModel::findOrFail($id);
        $emp_agr = EmploymentAgrementModel::where('application_id',$application->id)->delete();
        $application->delete();

        return back()->with('message', 'Application Deleted Successfully');
    }

    public function translate($slug) {
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('en'); // Translate from English
        $tr->setTarget('ar');

        return response()->json(['data' => $tr->translate($slug)], 200);
    }

    public function StoredAppPrint($id) {
        $request = ApplicationModel::join('employement_agrement','employement_agrement.application_id','=','application.id')
                                        ->where('application.id', $id)
                                        ->first();

        $license = ClientLicenseModel::findOrFail($request->business_address);
        return view('pages.application.application_print', compact('request', 'license'));
    }
}
