@extends('layouts.app-dashboard')

@php
    date_default_timezone_set("Asia/Gaza");

@endphp
@section('content')

    <link href="{{URL::asset('files/assets/pages/notification/notification.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/pnotify/dist/pnotify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/pnotify/dist/pnotify.brighttheme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/pnotify/dist/pnotify.buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/pnotify/dist/pnotify.history.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/pnotify/dist/pnotify.mobile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/pages/pnotify/notify.css')}}">

    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Reservations Busy</h4>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="{{route('admin.index_route')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Reservation</a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">All</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    @include('layouts.flash')

    <div class="page-body">

        <div class="card">
            <div class="card-header">
                <h5> Reservations Information </h5>
                <a  type="button" href="#create_reservation"  data-effect="effect-scale" data-toggle="modal"
                    class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                    Create New reservation  <i class="icofont icofont-plus"></i>
                </a>
            </div>



            <div class="card-block">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>

                            <th>No.</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Start </th>
                            <th>End </th>
                            <th>Duration</th>

                            <th>Operation</th>
                        </tr>
                        </thead>



                            <tbody>
                            <tr>
                                @forelse($reservations as $reservation)


                                <td>{{$loop->iteration}}</td>
                                <td>{{$reservation->number}}</td>
                                <td>{{$reservation->Customers->name}}</td>

                                @if($reservation->status() =='reserved')

                                    <td><span class="label label-success"> {{$reservation->status()}}</span></td>
                                    @elseif($reservation->status() =='canceled')
                                    <td><span class="label label-danger"> {{$reservation->status()}}</span></td>
                                    @elseif($reservation->status() =='finished')
                                        <td><span class="label label-info"> {{$reservation->status()}}</span></td>

                                    @else
                                    <td><span class="label label-warning"> {{$reservation->status()}}</span></td>
                                @endif
                                <td>{{$reservation->intervals->start}}</td>
                                <td>{{$reservation->intervals->end}}</td>
{{--                                <td>{{date('H:i',$reservation->reservation_end)}}</td>--}}
{{--                                <td>{{$reservation->duration}}</td>--}}

                                    <td>{{round(abs(($reservation->intervals->start) - ($reservation->intervals->end)) / 3600, 2)}}</td>
                                <td>

                                    <div class="dropdown-info dropdown open">
                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><li class="fa fa-gear fa-spin"></li></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                           <a  type="button"   data-effect="effect-scale" data-toggle="modal" href="#edit_reservation" data-id_reservation="{{ $reservation->id }}" data-number_reservation ="{{$reservation->number}}" data-reservation_start="{{  date("h:i",$reservation->reservation_start)}}"

                                              data-reservation_end="{{ date("h:i",$reservation->reservation_end)}}"     data-customer_id="{{ $reservation->customer_id }}" data-park_id="{{ $reservation->park_id }}" data-current_interval="{{ $reservation->intervals->start }}-{{ $reservation->intervals->end }}" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-ui-edit"> Edit</li> </a>

                                            <a  class="dropdown-item waves-light waves-effect" href="#delete_reservation"  data-id_reservation="{{ $reservation->id }}" data-reservation_number ="{{$reservation->number}}"
                                                                                         data-effect="effect-scale" data-toggle="modal" >
                                                                                    <li class="icofont icofont-trash"> Delete</li>  </a>
                                              <a  href="{{route('reservation.show',$reservation->id)}}" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-eye"> Details</li></a>
                                              <a  href="#edit_status" data-id_reservation="{{ $reservation->id }}" data-reservation_number ="{{$reservation->number}}" data-status_reservation ="{{$reservation->status}}"   data-effect="effect-scale" data-toggle="modal" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-arrow-right"> Status</li></a>

                                        </div>
                                    </div>
{{--                                    <a href="{{route('reservation.edit',$reservation->id)}}" class="btn btn-info"> <li class="icofont icofont-pen-alt-1"></li></a>--}}

{{--                                    <button  class="btn btn-danger" href="#delete_reservation"  data-id_reservation="{{ $reservation->id }}" data-reservation_number ="{{$reservation->number}}"--}}
{{--                                             data-effect="effect-scale" data-toggle="modal" >--}}
{{--                                        <li class="icofont icofont-trash"></li>--}}
{{--                                    </button>--}}

{{--                                    <a  href="{{route('reservation.show',$reservation->id)}}"  class="btn btn-success" > <li class="icofont icofont-eye"></li></a>--}}
                                </td>
                            </tr>

                            </tbody>

                        @empty
                            <tr>No  records found  </tr>

                        @endforelse
                        <tfoot>
                        <tr>

                            <th>No.</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Start </th>
                            <th>End </th>
                            <th>Duration</th>

                            <th>Operation</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- create -->
            <div class="modal fade" id="create_reservation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('reservation.store')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

{{--                                <div class="form-group">--}}
{{--                                    <label for="number_reservation" class="col-form-label">No.Reservation</label>--}}
{{--                                    <input type="text" required name="number_reservation" class="form-control" id="number_reservation">--}}
{{--                                </div>--}}
{{--                                @error('number_reservation')--}}
{{--                                <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                @enderror--}}

{{--                                <div class="form-group timepicker">--}}
{{--                                    <span class="fa fa-clock-o"></span>--}}
{{--                                    <label for="reservation_start" class="col-form-label">Reservation Start</label>--}}
{{--                                    <input type="text" readonly  value="" required name="reservation_start" class="form-control" id="reservation_start">--}}
{{--                                    @error('reservation_start')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}

{{--                                </div>--}}
{{--                                <div class="form-group timepicker">--}}
{{--                                    <span class="fa fa-clock-o"></span>--}}

{{--                                    <label for="reservation_end" class="col-form-label">Reservation End</label>--}}
{{--                                    <input type="text" readonly value="" required name="reservation_end" class="form-control" id="reservation_end">--}}
{{--                                    @error('reservation_end')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="interval" class="col-form-label">Interval</label>
                                    <select  name="interval_id" required  class="form-control">
                                        @foreach( $intervals as $interval)
                                            <option  value="{{$interval->id}}" >{{$interval->start}}-{{$interval->end}}</option>
                                        @endforeach
                                    </select>
                                    @error('interval')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer_name" class="col-form-label">Customer Name</label>
                                    <select  name="customer_id" required  class="form-control">
                                        @foreach( $customers as $customer)
                                        <option  value="{{$customer->id}}" >{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_name')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="park_slot" class="col-form-label">Park Slot</label>--}}
{{--                                    <select  name="park_id" required  class="form-control">--}}
{{--                                        @foreach( $parks as $park)--}}
{{--                                            <option  value="{{$park->id}}" >{{$park->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('park_slot')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}




                                <div class="modal-footer float-right">
                                    <button type="submit" class="btn btn-primary float-right">Reservation</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit -->
            <div class="modal fade" id="edit_reservation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('reservation.update',1)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden"   name="id_reservation" value="" class="form-control" id="id_reservation">

                                <div class="form-group">
                                    <label for="number_reservation" class="col-form-label">No.Reservation</label>
                                    <input type="text" disabled required name="number_reservation" value="{{old('number_reservation')}}" class="form-control" id="number_reservation">
                                </div>
                                <div class="form-group">
                                    <label for="current_interval" class="col-form-label">Current Interval</label>
                                    <input type="text" disabled required name="current_interval" value="{{old('number_reservation')}}" class="form-control" id="current_interval">
                                </div>
{{--                                @error('number_reservation')--}}
{{--                                <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                @enderror--}}

{{--                                <div class="form-group timepicker">--}}
{{--                                    <span class="fa fa-clock-o"></span>--}}
{{--                                    <label for="reservation_start" class="col-form-label">Reservation Start</label>--}}
{{--                                    <input type="text" readonly required name="reservation_start" value="{{ date("h:i",old('reservation_start'))}}" class="form-control" id="reservation_start">--}}
{{--                                    @error('reservation_start')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}

{{--                                </div> --}}
{{--                                <div class="form-group timepicker">--}}
{{--                                    <span class="fa fa-clock-o"></span>--}}

{{--                                    <label for="reservation_end" class="col-form-label">Reservation End</label>--}}
{{--                                    <input type="text" readonly required name="reservation_end" value="{{ date("h:i",old('reservation_end'))}}" class="form-control" id="reservation_end">--}}
{{--                                    @error('reservation_end')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}



                                <div class="form-group">
                                    <label for="interval" class="col-form-label">Interval</label>
                                    <select  name="interval_id" required  class="form-control">
                                        @foreach( $intervals as $interval)
                                            <option  value="{{$interval->id}}" >{{$interval->start}}-{{$interval->end}}</option>
                                        @endforeach
                                    </select>
                                    @error('interval')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer_name" class="col-form-label">Customer Name</label>
                                    <select  name="customer_id" required  class="form-control">
                                        @foreach( $customers as $customer)
                                            <option  value="{{$customer->id}}" >{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_name')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="park_slot" class="col-form-label">Park Slot</label>--}}
{{--                                    <select  name="park_id"  id="park_id" required  class="form-control">--}}
{{--                                        @foreach( $parks as $park)--}}

{{--                                            <option value="{{$park->id}}"  >{{$park->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('park_slot')--}}
{{--                                    <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}




                                <div class="modal-footer float-right">
                                    <button type="submit" class="btn btn-primary float-right">Update Reservation</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Delete Model -->
            <div class="modal fade" id="delete_reservation"  tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('reservation.destroy','delete')}}">
                                @csrf
                                {{method_field('delete')}}
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <h6 style="color:red" >Are you sure you want to delete the reservation?</h6>


                                            <input type="hidden" name="id_reservation" id="id_reservation" value="">

                                            <input type="text" disabled   name="reservation_number" value="" id="reservation_number" >

                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer float-center">
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Status -->
            <div class="modal fade" id="edit_status"  tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status Reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('admin.reservation_status','status')}}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">

                                                <input type="hidden" readonly required name="id_reservation"  class="form-control" id="id_reservation">
                                            <label for="number_reservation" class="col-form-label">No.Reservation</label>

                                            <input type="text" disabled   name="reservation_number" value="{{old('number_reservation')}}" id="reservation_number" >

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer_name" class="col-form-label">Status Type</label>
                                    <select  name="status" id="status" required  class="form-control">

                                           <option    value="1">Reserved</option>
                                           <option    value="2" >Busy</option>
                                           <option   value="3" >Finished</option>
                                           <option   value="0" >Canceled</option>

                                    </select>
                                    @error('customer_name')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="modal-footer float-center">
                                    <button type="submit" class="btn btn-success float-right">Change</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@section('script')

    <script>
        var defaults = {
            calendarWeeks: true,
            showClear: true,
            showClose: true,
            allowInputToggle: true,
            useCurrent: false,
            ignoreReadonly: true,
            minDate: new Date(),
            toolbarPlacement: 'top',
            locale: 'nl',
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-angle-up',
                down: 'fa fa-angle-down',
                previous: 'fa fa-angle-left',
                next: 'fa fa-angle-right',
                today: 'fa fa-dot-circle-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        };

        $(function() {
            var optionsDatetime = $.extend({}, defaults, {format:'DD-MM-YYYY hh:mm'});
            var optionsDate = $.extend({}, defaults, {format:'DD-MM-YYYY'});
            var optionsTime = $.extend({}, defaults, {format:'hh:mm'});

            $('.datepicker').datetimepicker(optionsDate);
            $('.timepicker').datetimepicker(optionsTime);
            $('.datetimepicker').datetimepicker(optionsDatetime);
        });
    </script>
    <script>
        $('#delete_reservation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_reservation = button.data('id_reservation')
            var reservation_number = button.data('reservation_number')
            var modal = $(this)
            modal.find('.modal-body #id_reservation').val(id_reservation);
            modal.find('.modal-body #reservation_number').val(reservation_number);
        })

        $('#edit_reservation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_reservation = button.data('id_reservation')
            var number_reservation = button.data('number_reservation')
            var reservation_start = button.data('reservation_start')
            var reservation_end = button.data('reservation_end')
            var customer_id = button.data('customer_id')
            var park_id = button.data('park_id')
            var current_interval = button.data('current_interval')
            var modal = $(this)
            modal.find('.modal-body #id_reservation').val(id_reservation);
            modal.find('.modal-body #number_reservation').val(number_reservation);
            modal.find('.modal-body #reservation_start').val(reservation_start);
            modal.find('.modal-body #reservation_end').val(reservation_end);
            modal.find('.modal-body #customer_id').val(customer_id);
            modal.find('.modal-body #park_id').val(park_id);
            modal.find('.modal-body #current_interval').val(current_interval);
        })
        $('#edit_status').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_reservation = button.data('id_reservation')
            var reservation_number = button.data('reservation_number')
            var status_reservation = button.data('status_reservation')

            var modal = $(this)
            modal.find('.modal-body #id_reservation').val(id_reservation);
            modal.find('.modal-body #reservation_number').val(reservation_number);
            modal.find('.modal-body #status_reservation').val(status_reservation);
        })
    </script>
    <script>
        export default {
            data() {
                return {
                    value: ''
                }
            }
        }
    </script>
@endsection

@endsection
