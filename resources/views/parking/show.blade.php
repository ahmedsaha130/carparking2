@extends('layouts.app-dashboard')

@section('content')
    <style>
        form.form  label.error, label.error {

            color: #F00;
            font-style: italic;
        }
    </style>
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>  Park Number: {{$park->number}}</h4>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="../index.html"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Parks</a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Summary</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.flash')

    <div class="page-body">


        <div class="page-body">

            <div class="container">

                <div>



                    <div class="card" >
                        <div class="row invoice-contact">
                            <div class="col-md-8">
                                <div class="invoice-box row">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs md-tabs " role="tablist">


                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#history" role="tab"><i class="icofont icofont-ui-clock"></i>History</a>
                                                <div class="slide"></div>
                                            </li>

                                        </ul>
                                        <div class="tab-content card-block">

                                            <div class="tab-pane active" id="history" role="tabpanel">
                                                <div id="print" class="table-border-style">
                                                    <div class="table-responsive" style="width:100%">
                                                        <table class="table " style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" > Number R</th>
                                                                <th scope="col"> Status</th>
                                                                <th scope="col"> Interval </th>
                                                                <th scope="col"> Customer Name</th>
                                                                <th scope="col"> Duration</th>
                                                                <th scope="col"> Create Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse($reservations as $reservation)
                                                                <tr>
                                                                    <td class="table-success">  {{$reservation->number}}</td>
                                                                    @if($reservation->status() =='reserved')

                                                                        <td class="table-success"><span class="label label-success"> {{$reservation->status()}}</span></td>
                                                                    @elseif($reservation->status() =='canceled')
                                                                        <td class="table-success"><span class="label label-danger"> {{$reservation->status()}}</span></td>
                                                                    @elseif($reservation->status() =='finished')
                                                                        <td class="table-success"><span class="label label-info"> {{$reservation->status()}}</span></td>

                                                                    @else
                                                                        <td class="table-success"><span class="label label-warning"> {{$reservation->status()}}</span></td>
                                                                    @endif

                                                                    <td class="table-success">{{$reservation->intervals->start}}-{{$reservation->intervals->end}}</td>
                                                                    <td class="table-success"> {{$reservation->customers->name}}</td>
                                                                    <td class="table-success"> {{$reservation->duration}}</td>

                                                                    <td class="table-success"> {{$reservation->created_at}}</td>


                                                                </tr>
                                                            @empty
                                                                <tr>No  records found  </tr>

                                                            @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>
    <button  onclick="printDiv()"  class="btn btn-primary "><li class="icofont icofont-print"></button>

    <div id="styleSelector">
    </div>
    </div>



@section('script')



    <script>
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection

@endsection
