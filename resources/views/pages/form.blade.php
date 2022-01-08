
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Form</li>
            </ol>
            @include('pages.alert')
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Edit Form
                        </div>
                        <div class="card-body">
                                
                            {!! Form::open(['url' => "/form", 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Monthly Salary</label>
                                        {{ Form::text('monthly_salary',$emp_agrement->monthly_salary,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('monthly_salary') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Food & Accommodation</label>
                                        {{ Form::text('food_acco',$emp_agrement->food_acco,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('food_acco') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Air Passage</label>
                                        {{ Form::text('air_passage',$emp_agrement->air_passage,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('air_passage') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Duty Hour</label>
                                        {{ Form::text('duty_hour',$emp_agrement->duty_hour,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('duty_hour') }}</span>
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
                                                <span class="text-danger">{{ $errors->first('overtime_benifit') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Medical Facilities</label>
                                        {{ Form::text('medical_fecilities',$emp_agrement->medical_fecilities,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('medical_fecilities') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Period of Contract</label>
                                        {{ Form::text('period_contact',$emp_agrement->period_contact,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('period_contact') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Repatriation Arrangement</label>
                                        {{ Form::text('repatriation_arrang',$emp_agrement->repatriation_arrang,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('repatriation_arrang') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Other team and condition</label>
                                        {{ Form::text('other_team_condition',$emp_agrement->other_team_condition,['class' =>'form-control']) }}
                                                <span class="text-danger">{{ $errors->first('other_team_condition') }}</span>
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
        
