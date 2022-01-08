
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
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit mr-1"></i>
                            License Add for {{ $data->name }}
                        </div>
                        <div class="card-body">
                            {!! Form::open(['url' => '/client_license', 'method' => 'POST']) !!}
                            <input type="hidden" name="client_id" value="{{ $data->id }}">
                            <input type="hidden" class="license_id" name="id" value="">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {{-- <label for="name">Company Name:</label> --}}
                                        {{ Form::text('name','',['class' => 'form-control license_name', 'placeholder' => 'Name']) }}
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {{-- <label for="phone">Address:</label> --}}
                                        {{ Form::text('address','',['class' => 'form-control license_address', 'placeholder' => 'Address']) }}
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-info">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            {{ $data->name }} License List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($client as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td class="active_btn">
                                                @if($value->status == 0)
                                                    <a href="/client_license_status/{{ $value->id }}" title="Status" class="btn btn-default">
                                                        <i class="fas fa-times-circle text-danger"></i>
                                                </a>
                                                @else
                                                    <a href="/client_license_status/{{ $value->id }}" title="Status" class="btn btn-default">
                                                        <i class="fas fa-check-circle text-success"></i>
                                                    </a>
                                                @endif
                                                <button class="btn btn-default" onclick="editLicense({{json_encode($value)}})">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </button>
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
        function editLicense(data) {
            const inputId = $('.license_id')
            const inputName = $('.license_name')
            const inputAddress = $('.license_address')
            inputId.val(data.id);
            inputName.val(data.name);
            inputAddress.val(data.address);
        }
    </script>
@endsection
