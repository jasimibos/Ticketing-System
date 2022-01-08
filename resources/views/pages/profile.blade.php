
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Clients</li>
            </ol>

            @include('pages.alert')
            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Profile
                        </div>
                        <div class="card-body">
                                
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Company Name:</label>
                                        {{ Form::text('name',$data->name,['class' => 'form-control', 'placeholder' => 'Name', 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        {{ Form::email('email',$data->email,['class' => 'form-control', 'placeholder' => 'Email', 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="owner_name">Owner Name:</label>
                                        {{ Form::text('owner_name',$data->owner_name,['class' => 'form-control', 'placeholder' => 'Owner Name', 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        {{ Form::text('phone',$data->phone,['class' => 'form-control', 'placeholder' => 'Phone', 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="amount_per_month">Amount Per Month:</label>
                                        @if(auth()->user()->role == 1)

                                        {{ Form::text('amount_per_month',$data->amount_per_month,['class' => 'form-control', 'placeholder' => 'Amount Per Month', 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('amount_per_month') }}</span>
                                        @else
                                        {{ Form::text('',$data->amount_per_month,['class' => 'form-control', 'placeholder' => 'Amount Per Month', 'readonly' => 'readonly']) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Address:</label>
                                        {{ Form::textarea('address',$data->address,['class' => 'form-control', 'placeholder' => 'Address', 'rows'=>3, 'readonly' => 'readonly']) }}
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Your License</h5>
                                    <ul>
                                        @foreach($data->license as $value)
                                        <li>{{ $value->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </main>
@stop
        
