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
                    <center class="client_details">
                        <h5>{{ $client->name }}</h5>
                        <p>{{ $client->owner_name }}</p>
                        <p>{{ $client->phone }}</p>
                        <p>Reg No : <b>{{ $client->reg_no }}</b></p>
                        <p>Paid Month : <b>{{ count($payment) }}</b></p>
                        <p>Paid Amount : <b>{{ $client->amount_per_month * count($payment) }} TK.</b></p>
                        <br>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Client For Payment
                        </div>
                        <div class="card-body">
                            @php
                                $pay_group = collect($payment)->groupBy('year');
                                $year = collect($payment)->pluck('year')->unique();
                                if (!array_key_exists(date('Y'), $pay_group->toArray())) {
                                    $pay_group[date('Y')] = [];
                                }
                            @endphp 

                            @foreach($pay_group as $key => $pay_group_fetch)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background: #f7f7f7;">
                                            <th colspan="12" class="text-center">{{ $key }}</th> 
                                        </tr>
                                        <tr>
                                            @for ($m=1; $m<=12; $m++) 
                                            @php
                                                $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                            @endphp
                                                <th>{{ $month }}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            @for ($m=1; $m<=12; $m++) 
                                            @php
                                                $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                                $pay_data = collect($payment)->where('month', $m)->where('year', $key);
                                            @endphp
                                                <td> 
                                                    <label class="switch">
                                                        <input type="checkbox" @if(count($pay_data) > 0) checked="checked" @endif @if(auth()->user()->role == 1) onclick="payNow('{{$m}}', '{{$key}}')" @else onclick="return false;" @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            @endfor
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            @endforeach
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
        const client_id = '{{ $client->id }}';

        function payNow(month, year) {
            $.ajax({
                url : '/payment',
                type : 'post',
                data : {
                    client_id : client_id,
                    month : month,
                    year : year
                },
                success : function(data) {
                    console.log(data);
                }
            })
        }
    </script>
@endif
@endsection
        
