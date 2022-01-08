@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Application</li>
            </ol>

            @include('pages.alert')


            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Edit {{ $data['name'] }}
                        </div>
                        <div class="card-body">

                            {!! Form::open(['url' => "/application/$data[application_id]", 'method' => 'PUT']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5>Application</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <input value="{{ $data['emp_agr_id'] }}" name="emp_agr_id" type="hidden">
                                            <input value="{{ $data['application_id'] }}" name="client_id" type="hidden">
                                        {{ Form::text('sl_no', $data['sl_no'], ['style' => 'float:right']) }}
                                        <!-- <input style="float:right;" value="{{ $data['sl_no'] }}" name="sl_no" type="number"> -->
                                            <span class="text-danger">{{ $errors->first('sl_no') }}</span>
                                        <!-- <input style="float:right;" value="{{ $data['sl_no'] }}" readonly="readonly"> -->
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @php
                                                $lecense_array=[''=>count($license) > 0 ? 'Select License' : 'You have No License']
                                            @endphp
                                            @foreach($license as $license_data)
                                                @php
                                                    $lecense_array[$license_data->id]=$license_data->name
                                                @endphp
                                            @endforeach
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Business Address</label>
                                                {{ Form::select('business_address', $lecense_array ,$data['business_address'],['class'=> 'form-control']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('business_address') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                {{ Form::text('name',$data['name'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sex</label>
                                                {{ Form::select('sex', ['Male' => 'Male', 'Female' => 'Female'],$data['sex'],['class'=> 'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('sex') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Religion</label>
                                                {{ Form::select('religion', ['Muslim' => 'Muslim', 'Non-Muslim' => 'Non-Muslim'],$data['religion'],['class'=> 'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Marital Status</label>
                                                {{ Form::select('marital_status', ['1' => 'Married', '2' => 'Single'],$data['mother_name'],['class'=> 'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mother's Name</label>
                                                {{ Form::text('mother_name',$data['mother_name'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Home Address</label>
                                                {{ Form::text('home_address',$data['home_address'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('home_address') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Passport No.</label>
                                                {{ Form::text('passport_no',$data['passport_no'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('pasport_no') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                {{ Form::text('dob',$data['dob'],['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Passport Issued Date</label>
                                                {{ Form::text('passport_issued_date',$data['passport_issued_date'],['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('passport_issued_date') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Passport Expiry Date</label>
                                                {{ Form::text('passport_expiry_date',$data['passport_expiry_date'],['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('passport_expiry_date') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Place of birth</label>
                                                {{ Form::text('pob',$data['pob'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('pob') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Mofa No.</label>
                                                {{ Form::text('mofa_no',$data['mofa_no'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('mofa_no') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Visa No.</label>
                                                {{ Form::text('visa_no',$data['visa_no'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('visa_no') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Visa Issue Date</label>
                                                {{ Form::text('visa_issue_date',$data['visa_issue_date'],['class' =>'form-control', 'placeholder' => 'yyyy-mm-dd']) }}
                                                <span class="text-danger">{{ $errors->first('visa_issue_date') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Sponsor Name</label>
                                                {{ Form::text('sponsor_name',$data['sponsor_name'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('sponsor_name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Profession</label>
                                                {{ Form::text('profession',$data['profession'],['class' =>'form-control profession']) }}
                                                <span class="text-danger">{{ $errors->first('profession') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Profession Arabic</label>
                                                {{ Form::text('profesion_arabic',$data['profesion_arabic'],['class' =>'form-control profesion_arabic']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('profesion_arabic') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Employee</h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Monthly Salary</label>
                                                {{ Form::text('monthly_salary',$data['monthly_salary'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('monthly_salary') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Food & Accommodation</label>
                                                {{ Form::text('food_acco',$data['food_acco'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('food_acco') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Air Passage</label>
                                                {{ Form::text('air_passage',$data['air_passage'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('air_passage') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Duty Hour</label>
                                                {{ Form::text('duty_hour',$data['duty_hour'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('duty_hour') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Holiday</label>
                                                {{ Form::text('holiday',$data['holiday'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('holiday') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Leave</label>
                                                {{ Form::text('leave',$data['leave'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('leave') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Overtime & Other benefit</label>
                                                {{ Form::text('overtime_benifit',$data['overtime_benifit'],['class' =>'form-control']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('overtime_benifit') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Medical Facilities</label>
                                                {{ Form::text('medical_fecilities',$data['medical_fecilities'],['class' =>'form-control']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('medical_fecilities') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Period of Contract</label>
                                                {{ Form::text('period_contact',$data['period_contact'],['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('period_contact') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Repatriation Arrangement</label>
                                                {{ Form::text('repatriation_arrang',$data['repatriation_arrang'],['class' =>'form-control']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('repatriation_arrang') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Other team and condition</label>
                                                {{ Form::text('other_team_condition',$data['other_team_condition'],['class' =>'form-control']) }}
                                                <span
                                                    class="text-danger">{{ $errors->first('other_team_condition') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-info">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </main>
@stop
@section('script')
    <script>
        $(document).on('keyup', '.profession', function () {
            $.ajax({
                url: '/application_translate/' + this.value,
                type: 'GET',
                success: function (data) {
                    $('.profesion_arabic').val(data.data);
                    console.log(data.data);
                }
            })
        })
    </script>
@stop

