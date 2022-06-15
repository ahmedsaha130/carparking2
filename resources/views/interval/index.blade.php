@extends('layouts.app-dashboard')
@section('content')


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
                    <h4>Intervals Management</h4>
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
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">interval</a>
                    </li>
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
                <h5> intervals Information </h5>
                <a  type="button" href="{{route('interval.create')}}"
                    class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                    Create New interval  <i class="icofont icofont-plus"></i>
                </a>
{{--                <a  type="button" href="#create_interval"  data-effect="effect-scale" data-toggle="modal"--}}
{{--                    class="btn btn-sm btn-primary waves-effect waves-light f-right" >--}}
{{--                    Create New interval  <i class="icofont icofont-plus"></i>--}}
{{--                </a>--}}
            </div>



            <div class="card-block">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>

                            <th>No.</th>
                            <th>Intervals</th>
                            <th>Count of(Intervals)</th>
                            <th>Status </th>
                            <th>Operation</th>
                        </tr>
                        </thead>



                        <tbody>
                        <tr>
                            @forelse($intervals as $interval)


                                <td>{{$loop->iteration}}</td>
                                <td>{{$interval->start}}-{{$interval->end}}</td>
                                <td>{{$interval->count}}</td>

                                @if($interval->status() =='active')

                                    <td><span class="label label-success"> {{$interval->status()}}</span></td>

                                @else
                                    <td><span class="label label-danger"> {{$interval->status()}}</span></td>
                                @endif

                                <td>

                                    <div class="dropdown-info dropdown open">
                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><li class="fa fa-gear fa-spin"></li></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                            <a  href="{{route('interval.edit',$interval->id)}}" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-ui-edit"> Edit</li> </a>

                                            <a  class="dropdown-item waves-light waves-effect" href="#delete_interval"  data-id_interval="{{ $interval->id }}" data-interval_start ="{{$interval->start}}" data-interval_end="{{$interval->end}}"
                                                data-effect="effect-scale" data-toggle="modal" >
                                                <li class="icofont icofont-trash"> Delete</li>  </a>
{{--                                            <a  href="{{route('interval.show',$interval->id)}}" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-eye"> Details</li></a>--}}
                                            <a  href="#edit_status" data-id_interval="{{ $interval->id }}" data-interval_start ="{{$interval->start}}" data-interval_end="{{$interval->end}}" data-status_interval ="{{$interval->status}}"   data-effect="effect-scale" data-toggle="modal" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-arrow-right"> Status</li></a>

                                        </div>
                                    </div>
                                </td>
                        </tr>

                        </tbody>

                        @empty
                            <tr>No  records found  </tr>

                        @endforelse
                        <tfoot>
                        <tr>

                            <th>No.</th>
                            <th>Intervals</th>
                            <th>Count of(Intervals)</th>
                            <th>Status </th>
                            <th>Operation</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- create -->
            <div class="modal fade" id="create_interval"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New interval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('interval.store')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="number_interval" class="col-form-label">No.interval</label>--}}
                                {{--                                    <input type="text" required name="number_interval" class="form-control" id="number_interval">--}}
                                {{--                                </div>--}}
                                {{--                                @error('number_interval')--}}
                                {{--                                <span class ='help-block text-danger'>{{ $message }}</span>--}}
                                {{--                                @enderror--}}

                                <div class="form-group timepicker">
                                    <span class="fa fa-clock-o"></span>
                                    <label for="interval_start" class="col-form-label">interval Start</label>
                                    <input type="text" readonly  value="" required name="interval_start" class="form-control" id="interval_start">
                                    @error('interval_start')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group timepicker">
                                    <span class="fa fa-clock-o"></span>

                                    <label for="interval_end" class="col-form-label">interval End</label>
                                    <input type="text" readonly value="" required name="interval_end" class="form-control" id="interval_end">
                                    @error('interval_end')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>






                                <div class="modal-footer float-right">
                                    <button type="submit" class="btn btn-primary float-right">interval</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit -->
            <div class="modal fade" id="edit_interval"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update interval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('interval.update',1)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden"   name="id_interval" value="" class="form-control" id="id_interval">

                                <div class="form-group">
                                    <label for="number_interval" class="col-form-label">No.interval</label>
                                    <input type="text" disabled required name="number_interval" value="{{old('number_interval')}}" class="form-control" id="number_interval">
                                </div>
                                {{--                                @error('number_interval')--}}
                                {{--                                <span class ='help-block text-danger'>{{ $message }}</span>--}}
                                {{--                                @enderror--}}

                                <div class="form-group timepicker">
                                    <span class="fa fa-clock-o"></span>
                                    <label for="interval_start" class="col-form-label">interval Start</label>
                                    <input type="text" readonly required name="interval_start" value="{{ date("h:i",old('interval_start'))}}" class="form-control" id="interval_start">
                                    @error('interval_start')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror

                                </div> <div class="form-group timepicker">
                                    <span class="fa fa-clock-o"></span>

                                    <label for="interval_end" class="col-form-label">interval End</label>
                                    <input type="text" readonly required name="interval_end" value="{{ date("h:i",old('interval_end'))}}" class="form-control" id="interval_end">
                                    @error('interval_end')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>







                                <div class="modal-footer float-right">
                                    <button type="submit" class="btn btn-primary float-right">Update interval</button>

                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Delete Model -->
            <div class="modal fade" id="delete_interval"  tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete interval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('interval.destroy',1)}}">
                                @csrf
                                {{method_field('delete')}}
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <h6 style="color:red" >Are you sure you want to delete the interval?</h6>


                                            <input type="hidden" name="id_interval" id="id_interval" value="">

                                            <input type="text" disabled   name="interval_start" value="" id="interval_start" >
                                            <input type="text" disabled   name="interval_end" value="" id="interval_end" >

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
                            <h5 class="modal-title" id="exampleModalLabel">Update Status interval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="post" id="add-form" action= "{{route('admin.interval_status','status')}}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">

                                            <input type="hidden" readonly required name="id_interval"  class="form-control" id="id_interval">

                                            <input type="text" disabled   name="interval_start" value="" id="interval_start" >
                                            <input type="text" disabled   name="interval_end" value="" id="interval_end" >
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer_name" class="col-form-label">Status Type</label>
                                    <select  name="status" id="status" required  class="form-control">

                                        <option  value="1">Active</option>
                                        <option  value="0">Disable</option>


                                    </select>
                                    @error('status')
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
        $('#delete_interval').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_interval = button.data('id_interval')
            var interval_start = button.data('interval_start')
            var interval_end = button.data('interval_end')
            var modal = $(this)
            modal.find('.modal-body #id_interval').val(id_interval);
            modal.find('.modal-body #interval_start').val(interval_start);
            modal.find('.modal-body #interval_end').val(interval_end);
        })

        $('#edit_interval').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_interval = button.data('id_interval')
            var number_interval = button.data('number_interval')
            var interval_start = button.data('interval_start')
            var interval_end = button.data('interval_end')
            var customer_id = button.data('customer_id')
            var park_id = button.data('park_id')
            var modal = $(this)
            modal.find('.modal-body #id_interval').val(id_interval);
            modal.find('.modal-body #number_interval').val(number_interval);
            modal.find('.modal-body #interval_start').val(interval_start);
            modal.find('.modal-body #interval_end').val(interval_end);
            modal.find('.modal-body #customer_id').val(customer_id);
            modal.find('.modal-body #park_id').val(park_id);
        })
        $('#edit_status').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_interval = button.data('id_interval')
            var interval_start = button.data('interval_start')
            var interval_end = button.data('interval_end')

            var modal = $(this)
            modal.find('.modal-body #id_interval').val(id_interval);
            modal.find('.modal-body #interval_start').val(interval_start);
            modal.find('.modal-body #interval_end').val(interval_end);
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

@endsection
