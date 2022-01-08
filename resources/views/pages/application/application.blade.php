@extends('index')
@section('main_section')
    <style>
        .pagination {
            float: right;
        }
    </style>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Application</li>
            </ol>

            @include('pages.alert')

            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <button type="button" class="btn btn-info modal_btn" data-toggle="modal" data-target="#application">
                        Create Application
                    </button>
                </div>
            </div>
            <br>

            <div class="modal fade bd-example-modal-lg" id="application" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        {{ Form::open(['url' => 'application','id' => 'form_submit' , 'method' => 'post']) }}
                        <div class="modal-header">
                            <div class="col-md-6">
                                <h5 class="" id="exampleModalLabel">Application</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Office SL No.</h5>
                            </div>
                            <div class="col-md-4" style="display: inline-flex;">
                                {{ Form::text('sl_no', '') }}
                                </br>
                                <span style="width : 100%" class="text-danger">{{ $errors->first('sl_no') }}</span>
                                <input type="hidden" name="client_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="type_id" id="type_id" value="">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="tabs" class="nav nav-tabs">
                                        <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab"
                                                                class="nav-link small text-uppercase active">Application</a>
                                        </li>
                                        <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab"
                                                                class="nav-link small text-uppercase">Employment
                                                Agrement</a></li>
                                    </ul>
                                    <br>

                                    <div id="tabsContent" class="tab-content">
                                        <div id="home1" class="tab-pane fade active show">
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
                                                        {{ Form::select('business_address', $lecense_array ,null,['class'=> 'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('business_address') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        {{ Form::text('name','',['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sex</label>
                                                        {{ Form::select('sex', ['Male' => 'Male', 'Female' => 'Female'],null,['class'=> 'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('sex') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Religion</label>
                                                        {{ Form::select('religion', ['Muslim' => 'Muslim', 'Non-Muslim' => 'Non-Muslim'],null,['class'=> 'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('religion') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Marital Status</label>
                                                        {{ Form::select('marital_status', ['1' => 'Married', '2' => 'Unmarried'],null,['class'=> 'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Mother's Name</label>
                                                        {{ Form::text('mother_name','',['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('mother_name') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Home Address</label>
                                                        {{ Form::text('home_address','',['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('home_address') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Passport No.</label>
                                                        {{ Form::text('passport_no','',['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('passport_no') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Date of birth</label>
                                                        {{ Form::text('dob','',['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Passport Issued Date</label>
                                                        {{ Form::text('passport_issued_date','',['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('passport_issued_date') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Passport Expiry Date</label>
                                                        {{ Form::text('passport_expiry_date','',['class' =>'form-control', 'placeholder' => 'dd-mm-yyyy']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('passport_expiry_date') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Place of birth</label>
                                                        {{ Form::text('pob','',['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('pob') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Mofa No.</label>
                                                        {{ Form::text('mofa_no','',['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('mofa_no') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Visa No.</label>
                                                        {{ Form::text('visa_no','',['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('visa_no') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Visa Issue Date</label>
                                                        {{ Form::text('visa_issue_date','',['class' =>'form-control', 'placeholder' => 'yyyy-mm-dd']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('visa_issue_date') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label>Sponsor Name</label>
                                                        {{ Form::text('sponsor_name','',['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('sponsor_name') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        {{ Form::text('profession','',['class' =>'form-control profession']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('profession') }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Profession Arabic</label>
                                                        {{ Form::text('profesion_arabic','',['class' =>'form-control profesion_arabic']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('profesion_arabic') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="profile1" class="tab-pane fade">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Monthly Salary</label>
                                                        {{ Form::text('monthly_salary',$emp_agrement->monthly_salary,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('monthly_salary') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Food & Accommodation</label>
                                                        {{ Form::text('food_acco',$emp_agrement->food_acco,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('food_acco') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Air Passage</label>
                                                        {{ Form::text('air_passage',$emp_agrement->air_passage,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('air_passage') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Duty Hour</label>
                                                        {{ Form::text('duty_hour',$emp_agrement->duty_hour,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('duty_hour') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Holiday</label>
                                                        {{ Form::text('holiday',$emp_agrement->holiday,['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('holiday') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Leave</label>
                                                        {{ Form::text('leave',$emp_agrement->leave,['class' =>'form-control']) }}
                                                        <span class="text-danger">{{ $errors->first('leave') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Overtime & Other benefit</label>
                                                        {{ Form::text('overtime_benifit',$emp_agrement->overtime_benifit,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('overtime_benifit') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Medical Facilities</label>
                                                        {{ Form::text('medical_fecilities',$emp_agrement->medical_fecilities,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('medical_fecilities') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Period of Contract</label>
                                                        {{ Form::text('period_contact',$emp_agrement->period_contact,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('period_contact') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Repatriation Arrangement</label>
                                                        {{ Form::text('repatriation_arrang',$emp_agrement->repatriation_arrang,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('repatriation_arrang') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Other team and condition</label>
                                                        {{ Form::text('other_team_condition',$emp_agrement->other_team_condition,['class' =>'form-control']) }}
                                                        <span
                                                            class="text-danger">{{ $errors->first('other_team_condition') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info form_btn" onclick="formSubmit(1)">Save
                                </button>
                                <button type="button" class="btn btn-info form_btn" onclick="formSubmit(2)">Print
                                </button>
                                <button type="button" class="btn btn-info form_btn" onclick="formSubmit(3)">Save &
                                    Print
                                </button>
                                <button type="button" class="btn btn-info enable_btn" data-target="#profile1"
                                        data-toggle="tab">Next
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <i class="fas fa-table mr-1"></i>
                                    Application List
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-1">
                                            <div class="dataTables_length" id="dataTable_length">
                                                <label>
                                                    <select name="per_page"
                                                            class="custom-select custom-select-sm form-control form-control-sm"
                                                            onchange="searchForm()">
                                                        <option value="100">100</option>
                                                        <option
                                                            @if(isset($request['per_page']) && $request['per_page'] == 200) selected="selected"
                                                            @endif value="200">200
                                                        </option>
                                                        <option
                                                            @if(isset($request['per_page']) && $request['per_page'] == 500) selected="selected"
                                                            @endif value="500">500
                                                        </option>
                                                        <option
                                                            @if(isset($request['per_page']) && $request['per_page'] == 1000) selected="selected"
                                                            @endif value="1000">All
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-11" style="display : inline-flex">
                                            <label>
                                                <input value="{{ isset($request['search']) ? $request['search'] : '' }}"
                                                       class="form-control form-control-sm" placeholder="search"
                                                       name="search" style="width: 205px;">
                                            </label>
                                            <select name="license"
                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                    onchange="searchForm()">
                                                <option value="">Select License</option>
                                                @foreach($license as $license_data)
                                                    <option @if(isset($request['license']) && $request['license']) ==
                                                    $license_data->id) selected="selected" @endif
                                                    value="{{ $license_data->id }}">{{ $license_data->name }}</option>
                                                @endforeach
                                            </select>

                                            <select name="gender"
                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                    onchange="searchForm()">
                                                <option value="">Select Sex</option>
                                                <option
                                                    @if(isset($request['gender']) && $request['gender'] == 'Male') selected="selected"
                                                    @endif value="Male">Male
                                                </option>
                                                <option
                                                    @if(isset($request['gender']) && $request['gender'] == 'Female') selected="selected"
                                                    @endif value="Female">Female
                                                </option>
                                            </select>

                                            <select name="marital_status"
                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                    onchange="searchForm()">
                                                <option value="">Marital Status</option>
                                                <option
                                                    @if(isset($request['marital_status']) && $request['marital_status'] == 1) selected="selected"
                                                    @endif value="1">Married
                                                </option>
                                                <option
                                                    @if(isset($request['marital_status']) && $request['marital_status'] == 2) selected="selected"
                                                    @endif value="2">Unmarried
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>License Name</th>
                                        <th>Name</th>
                                        <th>SL No</th>
                                        <th>Sex</th>
                                        <th>Visa No</th>
                                        <th>Visa Type</th>
                                        <th>Passport</th>
                                        <th>Mofa No</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($application as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->applicationLicense->name }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->sl_no }}</td>
                                            <td>{{ $value->sex }}</td>
                                            <td>{{ $value->visa_no }}</td>
                                            <td>{{ $value->profession }}</td>
                                            <td>{{ $value->passport_no }}</td>
                                            <td>{{ $value->mofa_no }}</td>
                                            <td class="active_btn">
                                                {{Form::open(['url'=>"/application/$value->id",'method'=>'DELETE'])}}
                                                <button onclick="return confirm('Are you sure?')"
                                                        class="btn btn-default" title="DELETE">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/application/$value->id/edit",'method'=>'GET'])}}
                                                <button title="EDIT" class="btn btn-default">
                                                    <i class="far fa-edit text-info"></i>
                                                </button>
                                                {{Form::close()}}
                                                <button class="btn btn-default" onclick="infoDetails('{{$value->id}}')">
                                                    <i class="fas fa-info-circle text-primary"></i>
                                                </button>
                                                <a href="/stored_application_print/{{$value->id}}"
                                                   class="btn btn-default">
                                                    <i class="fas fa-print text-success"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $application->onEachSide(5)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="info_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left: -125px; width: 150%;">
                <div class="modal-header">
                    <h5 class="modal-title">Application Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info_details">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.form_btn').hide();
        })

        $(document).on('click', '.enable_btn', function () {
            $('.form_btn').show();
            $('.enable_btn').hide();
        })

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

        function infoDetails(id) {
            $.ajax({
                url: '/application/' + id,
                type: 'GET',
                success: function (data) {
                    $('#info_details').html(data);
                    $('#info_modal').modal('show');
                }
            })
        }

        function formSubmit(type) {
            const url = '{{ url('/') }}';
            const form = $('#form_submit');
            var type_id = $('#type_id');

            if (type === 1) {
                type_id.val(1);
                form.attr('action', url + '/application');
            }
            if (type === 2) {
                type_id.val(2);
                form.attr('action', url + '/application_print');
            }
            if (type === 3) {
                type_id.val(3);
                form.attr('action', url + '/application');
            }
            form.submit();
        }


        function searchForm() {
            const url = '{{ url('/') }}';
            const search_form = $('#search_form');

            search_form.attr('action', url + '/application');
            search_form.submit();
        }
    </script>
@stop

