@extends('layouts.app-dashboard')

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
                    <h4>Parking Management</h4>
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
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Parking</a>
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
                <h5> Parking Information </h5>
                <a  type="button" href="{{route('park.create')}}"  data-effect="effect-scale"
                    class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                    Create New park  <i class="icofont icofont-plus"></i>
                </a>
            </div>
            <div class="card-block">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>

                            <th>No.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Status</th>
                            <th>Start Sensor</th>
                            <th>End Sensor</th>
                            <th>Note</th>
                            <th>Operation</th>
                        </tr>
                        </thead>


                        @forelse($parks as $park)


                            <tbody>
                            <tr>

                                <td>{{$loop->iteration}}n</td>
                                <td>{{$park->name}}</td>
                                <td>{{$park->number}}</td>

                                @if($park->status() =='active')

                                    <td><span class="label label-success"> {{$park->status()}}</span></td>
                                @else
                                    <td><span class="label label-danger"> {{$park->status()}}</span></td>
                                @endif
                                <td>{{$park->start_time_sensor}}</td>
                                <td>{{$park->end_time_sensor}}</td>
                                <td>{{$park->note}}</td>
                                <td>

                                    <div class="dropdown-info dropdown open">
                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><li class="fa fa-gear fa-spin"></li></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                            <a    href="{{route('park.edit',$park->id)}}"

                                                 class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-ui-edit"> Edit</li> </a>

                                            <a  class="dropdown-item waves-light waves-effect"  href="#delete_park"  data-id_park="{{ $park->id }}" data-park_name ="{{$park->name}}"
                                                data-effect="effect-scale" data-toggle="modal" >
                                                <li class="icofont icofont-trash"> Delete</li>  </a>
                                            <a  href="{{route('park.show',$park->id)}}" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-eye"> Details</li></a>
                                            <a  href="#edit_status" data-id_park ="{{$park->id}}" data-park_number ="{{$park->number}}" data-status_park ="{{$park->status}}" data-effect="effect-scale" data-toggle="modal" class="dropdown-item waves-light waves-effect" > <li class="icofont icofont-arrow-right"> Status</li></a>

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
                            <th>Name</th>
                            <th>Number</th>
                            <th>Status</th>
                            <th>Start Sensor</th>
                            <th>End Sensor</th>
                            <th>Note</th>
                            <th>Operation</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- upload image -->
            <div class="modal fade" id="delete_park"  tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete park</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="add-form" action= "{{route('park.destroy','delete')}}">
                                @csrf
                                {{method_field('delete')}}
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <h6 style="color:red" >Are you sure you want to delete the park?</h6>


                                            <input type="hidden" name="id_park" id="id_park" value="">

                                            <input type="text" disabled   name="park_name" value="" id="park_name" >

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

                            <form method="POST" id="add-form" action= "{{route('admin.park_status','status')}}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <div class="file-field input-field">
                                        <div class="btn">

                                            <input type="hidden" readonly required name="id_park"  class="form-control" id="id_park">
                                            <label for="number_reservation" class="col-form-label">No.Reservation</label>

                                            <input type="text" disabled   name="park_number" value="{{old('park_number')}}" id="park_number" >

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status_park" class="col-form-label">Status Type</label>
                                    <select  name="status_park" id="status_park"  required  class="form-control">
                                        <option    value="1">Active</option>
                                        <option    value="0" >Inactive</option>
                                    </select>
                                    @error('status_park')
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
        $('#delete_park').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_park = button.data('id_park')
            var park_name = button.data('park_name')
            var modal = $(this)
            modal.find('.modal-body #id_park').val(id_park);
            modal.find('.modal-body #park_name').val(park_name);
        })

        $('#edit_status').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_park = button.data('id_park')
            var park_number = button.data('park_number')
            var status_park = button.data('status_park')

            var modal = $(this)
            modal.find('.modal-body #id_park').val(id_park);
            modal.find('.modal-body #park_number').val(park_number);
            modal.find('.modal-body #status_park').val(status_park);
        })

        $("#status_park").on("change", function () {
            $modal = $('#edit_status');
            if($(this).val() === 0){
                $modal.modal('hide');

            }else {

            }
        });
    </script>
@endsection

@endsection
