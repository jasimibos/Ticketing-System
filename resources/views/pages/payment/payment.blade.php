
@extends('index')
@section('main_section')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .client_details p {
        line-height: 5px;
    }

    .client_details h5 {
        line-height: 30px;
    }
</style>

    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Payment</li>
            </ol>

            @include('pages.alert')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <i class="fas fa-table mr-1"></i>
                                    Client For Payment
                                </div>
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3">
                                    <form id="form_submit">
                                        <select class="form-control" id="year" name="year" onchange="yearSubmit()">
                                            @foreach($year as $value)
                                            <option @if($selected_year == $value) selected @endif value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Owner Name</th>
                                            <th>Reg No</th>
                                            <th>Action</th>
                                            @for ($m=1; $m<=12; $m++) 
                                            @php
                                                $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                            @endphp
                                                <th>{{ $month }}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client as $key => $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->owner_name }}</td>
                                            <td>{{ $value->reg_no }}</td>
                                            <td class="active_btn">

                                                {{Form::open(['url'=>"/payment/$value->id/edit",'method'=>'GET'])}}
                                                    <button title="Payment" class="btn btn-default">
                                                        <i class="fas fa-comment-dollar text-success"></i> view all
                                                    </button>
                                                {{Form::close()}}

                                            </td>
                                            @for ($m=1; $m<=12; $m++) 
                                            @php
                                                $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                                $pay_data = collect($payment)->where('month', $m)->where('client_id', $value->id);
                                            @endphp
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" @if(count($pay_data) > 0) checked="checked" @endif onclick="payNow('{{$m}}', '{{$value->id}}')">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            @endfor
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
@if(auth()->user()->role == 1)
    <script type="text/javascript">
        function payNow(month, id) {
            $.ajax({
                url : '/payment',
                type : 'post',
                data : {
                    client_id : id,
                    month : month,
                    year : $('#year').val(),
                },
                success : function(data) {
                    console.log(data);
                }
            })
        }

        function yearSubmit(){
            const url = '{{ url('/') }}';
            const form = $('#form_submit');

            form.attr('action', url+'/payment');
            form.submit();
        }
    </script>
@endif
@endsection
