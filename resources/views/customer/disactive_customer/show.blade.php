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

                                    <div class="card" id="print">
                                        <div class="row invoice-contact">
                                            <div class="col-md-8">
                                                <div class="invoice-box row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-responsive invoice-table table-borderless">
                                                            <tbody>
                                                            <tr>
                                                                <td><img src="{{asset('files/assets/customer/'.$customer->customer_image)}}" width="200" height="200" class="m-b-10" alt="customer name"></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-block">
                                            <div class="row invoive-info">
                                                <div class="col-6 ">
                                                    <h6>Client Information :</h6>

                                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                        <tr>

                                                        <th>
                                                            Customer Name :
                                                        </th>
                                                        <td>
                                                            {{$customer->name}}
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <th>
                                                            Mobile :
                                                        </th>
                                                        <td>
                                                            {{$customer->mobile}}
                                                        </td>
                                                        </tr>
                                                        <tr>


                                                        <th>
                                                            Email:

                                                        </th>
                                                        <td>
                                                            <a href="mailto:{{$customer->email}}">{{$customer->email}}</a>
                                                        </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div class="col-6">

                                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                        <tbody>
                                                        <tr>
                                                            <th> Date Register : </th>
                                                            <td>   {{$customer->created_at->format('m/d/Y') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status :</th>
                                                            <td>
                                                                @if($customer->status() =='active')

                                                                <span class="label label-success"> {{$customer->status()}}</span>
                                                                @else
                                                                    <span class="label label-danger"> {{$customer->status()}}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <th>
                                                            bio:
                                                        </th>
                                                            <td> {{$customer->bio}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-sm-12 invoice-btn-group text-center">
                                            <button  onclick="printDiv()" type="button"  class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20">Print</button>
                                            <button type="button" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

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
