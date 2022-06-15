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
                    <h4>  Customer: {{$customer->name}}</h4>
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
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Customers</a>
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
                                                                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-user "></i>Profile</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#history" role="tab"><i class="icofont icofont-ui-clock"></i>History</a>
                                                                <div class="slide"></div>
                                                            </li>

                                                        </ul>
                                                        <div class="tab-content card-block">
                                                            <div class="tab-pane active" id="profile7" role="tabpanel">
                                                                        <div id="print" class="table-border-style">
                                                                            <div class="table-responsive" style="width:100%">
                                                                                <table class="table " style="width:100%">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col" > Name</th>
                                                                                        <th scope="col"> Image</th>
                                                                                        <th scope="col"> Mobile </th>
                                                                                        <th scope="col"> Email</th>
                                                                                        <th scope="col"> Date Register</th>
                                                                                        <th scope="col"> Status</th>
                                                                                        <th scope="col"> Bio</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr >
                                                                                        <td class="table-success">  {{$customer->name}}</td>
                                                                                        <td class="table-success">  {{$customer->image}}</td>
                                                                                        <td class="table-success">     {{$customer->mobile}}</td>
                                                                                        <td class="table-success"> <a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>
                                                                                        <td class="table-success">  {{$customer->created_at->format('m/d/Y') }}</td>
                                                                                        @if($customer->status() =='active')

                                                                                            <td class="table-success">  <span class="label label-success"> {{$customer->status()}}</span></td>
                                                                                        @else
                                                                                            <td class="table-success">   <span class="label label-danger"> {{$customer->status()}}</span></td>
                                                                                        @endif
                                                                                        <td class="table-success"> {{$customer->bio}}</td>


                                                                                    </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>


                                                            </div>
                                                                <div class="tab-pane " id="history" role="tabpanel">
                                                                    <div id="print" class="table-border-style">
                                                                        <div class="table-responsive" style="width:100%">
                                                                            <table class="table " style="width:100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th scope="col" > Number</th>
                                                                                    <th scope="col"> Status</th>
                                                                                    <th scope="col"> Interval </th>
                                                                                    <th scope="col"> Park Number</th>
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
                                                                                    <td class="table-success"> {{$reservation->parks->number}}</td>
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
        $(function () {
            $('#customer-image').fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });

    </script>
    <script>

        $('.removeImage').click(function () {
            $.post('{{ route('customer.remove_image') }}', { customer_id: '{{ $customer->id }}', _token: '{{ csrf_token() }}'}, function (data) {
                if (data == 'true') {
                    window.location.href = window.location;
                }
            })

        });

    </script>
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
