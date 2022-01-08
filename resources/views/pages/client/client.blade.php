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
                <div class="col-xl-3 col-md-6">
                    <button  type="button" class="btn btn-info modal_btn" data-toggle="modal" data-target="#myModal">Create Client</button>
                </div>
            </div>
            <br>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 700px; right: 90px;">
                        {!! Form::open(['url' => '/client']) !!}
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Company Name:</label>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="owner_name">Owner Name:</label>
                                        {{ Form::text('owner_name','',['class' => 'form-control', 'placeholder' => 'Owner Name']) }}
                                        <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        {{ Form::text('phone','',['class' => 'form-control', 'placeholder' => 'Phone']) }}
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="amount_per_month">Amount Per Month:</label>
                                        {{ Form::text('amount_per_month','',['class' => 'form-control', 'placeholder' => 'Amount Per Month']) }}
                                        <span class="text-danger">{{ $errors->first('amount_per_month') }}</span>
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
                            <center>
                                <h4>License</h4>
                                <hr>
                            </center>
                            <div class="license">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="phone">Company Name:</label>
                                            {{ Form::text('license_name[]','',['class' => 'form-control', 'placeholder' => 'Company Name']) }}
                                            <span class="text-danger">{{ $errors->first('license_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="phone">Address:</label>
                                            {{ Form::text('license_address[]','',['class' => 'form-control', 'placeholder' => 'Address']) }}
                                            <span class="text-danger">{{ $errors->first('license_address') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>:</label><br>
                                            <button type="button" class="btn btn-success add_row">+</button>
                                        </div>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Owner Name</th>
                                            <th>Total License</th>
                                            <th>Reg No</th>
                                            <th>Amount Per month</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->owner_name }}</td>
                                            <td>{{ $value->license_count }}</td>
                                            <td>{{ $value->reg_no }}</td>
                                            <td>{{ $value->amount_per_month }}</td>
                                            <td class="active_btn">
                                                {{Form::open(['url'=>"/client/$value->id",'method'=>'DELETE'])}}
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-default" title="DELETE">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/client/$value->id/edit",'method'=>'GET'])}}
                                                    <button title="EDIT" class="btn btn-default">
                                                        <i class="far fa-edit text-info"></i>
                                                    </button>
                                                {{Form::close()}}

                                                {{Form::open(['url'=>"/client/$value->id",'method'=>'GET'])}}
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

                                                {{Form::open(['url'=>"/payment/$value->id/edit",'method'=>'GET'])}}
                                                    <button title="Payment" class="btn btn-default">
                                                        <i class="fas fa-comment-dollar text-success"></i>
                                                    </button>
                                                {{Form::close()}}

                                                <a href="/client_license/{{$value->id}}" class="btn btn-default">
                                                    <i class="fas fa-award text-primary"></i>
                                                </a>
                                                
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
@section('script')
    <script>
        $(document).on('click', '.add_row', function() {
            $('.license').append(`
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="phone">Company Name:</label>
                            {{ Form::text('license_name[]','',['class' => 'form-control', 'placeholder' => 'Company Name']) }}
                            <span class="text-danger">{{ $errors->first('license_name') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="phone">Company Name:</label>
                            {{ Form::text('license_address[]','',['class' => 'form-control', 'placeholder' => 'Address']) }}
                            <span class="text-danger">{{ $errors->first('license_address') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>:</label><br>
                            <button type="button" class="btn btn-danger remove_row">-</button>
                        </div>
                    </div>
                </div>
            `);
        })
        $(document).on('click', '.remove_row', function() {
            $(this).parent('div').parent('div').parent('div').remove();
        })
    </script>
@endsection
        
