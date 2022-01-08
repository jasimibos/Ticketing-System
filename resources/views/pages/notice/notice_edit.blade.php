
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Notice</li>
            </ol>

            @include('pages.alert')

            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            Edit Notice
                        </div>
                        <div class="card-body">
                                
                            {!! Form::open(['url' => "/notice/$data->id", 'method' => 'PUT']) !!}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Title:</label>
                                            {{ Form::text('title',$data->title,['class' => 'form-control', 'placeholder' => 'Title']) }}
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Description:</label>
                                            {{ Form::textarea('description',$data->description,['class' => 'form-control', 'placeholder' => 'Description', 'rows'=>4]) }}
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
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
        
