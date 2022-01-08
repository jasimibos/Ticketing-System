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
                <div class="col-xl-3 col-md-6">
                    <button  type="button" class="btn btn-info modal_btn" data-toggle="modal" data-target="#myModal">Create Admin</button>
                </div>
            </div>
            <br>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 700px; right: 90px;">
                        {!! Form::open(['url' => '/admin']) !!}
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Admin</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name"> Name:</label>
                                        {{ Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name']) }}
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        {{ Form::email('email','',['class' => 'form-control', 'placeholder' => 'Email']) }}
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        {{ Form::text('phone','',['class' => 'form-control', 'placeholder' => 'Phone']) }}
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
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
                                    <div class="form-group">
                                        <label for="phone">Address:</label>
                                        {{ Form::textarea('address','',['class' => 'form-control', 'placeholder' => 'Address', 'rows'=>3]) }}
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Admin List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admin as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td class="active_btn">
                                                {{Form::open(['url'=>"/admin/$value->id",'method'=>'DELETE'])}}
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-default" title="DELETE">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/admin/$value->id/edit",'method'=>'GET'])}}
                                                    <button title="EDIT" class="btn btn-default">
                                                        <i class="far fa-edit text-info"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/admin/$value->id",'method'=>'GET'])}}
                                                    @if($value->status == 0)
                                                    <button title="Status" class="btn btn-default">
                                                        <i class="fas fa-spinner text-warning"></i>
                                                    </button>
                                                    @else
                                                    <button title="Status" class="btn btn-default">
                                                        <i class="fas fa-spinner text-success"></i>
                                                    </button>
                                                    @endif
                                                {{Form::close()}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
        
