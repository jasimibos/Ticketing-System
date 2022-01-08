
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Admin</li>
            </ol>

            @include('pages.alert')

            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Edit {{ $data->name }}
                        </div>
                        <div class="card-body">
                                
                            {!! Form::open(['url' => "/admin/$data->id", 'method' => 'PUT']) !!}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name"> Name:</label>
                                            {{ Form::text('name',$data->name,['class' => 'form-control', 'placeholder' => 'Name']) }}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            {{ Form::email('email',$data->email,['class' => 'form-control', 'placeholder' => 'Email']) }}
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Phone:</label>
                                            {{ Form::text('phone',$data->phone,['class' => 'form-control', 'placeholder' => 'Phone']) }}
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Address:</label>
                                            {{ Form::textarea('address',$data->address,['class' => 'form-control', 'placeholder' => 'Address', 'rows'=>3]) }}
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
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
        
