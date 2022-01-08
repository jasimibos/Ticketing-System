
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> Change Password</li>
            </ol>

            @include('pages.alert')

            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Change Password
                        </div>
                        <div class="card-body">
                                
                            {!! Form::open(['url' => "/change_password", 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        {{ Form::password('old_password',['class' => 'form-control', 'placeholder' => 'Password']) }}
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">New Password:</label>
                                        {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) }}
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password:</label>
                                        {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Password']) }}
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
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
                <div class="col-lg-3"></div>
            </div>
        </div>
    </main>
@stop
        
