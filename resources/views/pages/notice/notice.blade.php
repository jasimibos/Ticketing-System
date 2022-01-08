
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
                <div class="col-xl-3 col-md-6">
                    <button  type="button" class="btn btn-info modal_btn" data-toggle="modal" data-target="#myModal">Create Notice</button>
                </div>
            </div>
            <br>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        {!! Form::open(['url' => '/notice']) !!}
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Notice</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Title:</label>
                                        {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title']) }}
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Description:</label>
                                        {{ Form::textarea('description','',['class' => 'form-control', 'placeholder' => 'Description', 'rows'=>4]) }}
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
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
                            Client List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notice as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td class="active_btn">
                                                {{Form::open(['url'=>"/notice/$value->id",'method'=>'DELETE'])}}
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-default" title="DELETE">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/notice/$value->id/edit",'method'=>'GET'])}}
                                                    <button title="EDIT" class="btn btn-default">
                                                        <i class="far fa-edit text-info"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/notice/$value->id",'method'=>'GET'])}}
                                                    @if($value->status == 0)
                                                    <button title="Status" class="btn btn-default">
                                                        <i class="fas fa-times-circle text-danger"></i>
                                                    </button>
                                                    @else
                                                    <button title="Status" class="btn btn-default">
                                                        <i class="fas fa-check-circle text-success"></i>
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
        
