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
                        <h4>User Profile</h4>
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
                        <li class="breadcrumb-item" style="float: left;"><a href="#!">User Profile</a>
                        </li>
                        <li class="breadcrumb-item" style="float: left;"><a href="#!">User Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@include('layouts.flash')


<div class="page-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="cover-profile">
                    <div class="profile-bg-img">
                        <img class="profile-bg-img img-fluid" src="/files/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                        <div class="card-block user-info">
                            <div class="col-md-12">
                                <div class="media-left">
                                    <a href="#" class="profile-image">
                                        <img class="user-img img-radius" width="100" height="100" src="{{asset('/files/assets/users/'.$user->user_image)}}" alt="user-img">
                                    </a>
                                </div>
                                <div class="media-body row">
                                    <div class="col-lg-12">
                                        <div class="user-title">
                                            <h2>{{auth()->user()->name}}</h2>
                                            <span class="text-white">Admin</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="tab-header card">
                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                            <div class="slide"></div>
                        </li>

                    </ul>
                </div>

                <div class="tab-content">

                    <div class="tab-pane active" id="personal" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">About Me</h5>
                                <button   href="#updateprofile"  data-effect="effect-scale" data-toggle="modal"  data-name="{{$user->name}}"  data-email="{{ $user->email }}" data-mobile="{{ $user->mobile }}" data-status="{{ $user->status }}" data-receive_email="{{ $user->receive_email }}"
                                        class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                                    <i class="icofont icofont-edit"></i>
                                </button>
                                <button   href="#uploadimage"  data-effect="effect-scale" data-toggle="modal"  data-name="{{$user->name}}"  data-email="{{ $user->email }}" data-mobile="{{ $user->mobile }}" data-status="{{ $user->status }}" data-receive_email="{{ $user->receive_email }}"
                                        class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                                    upload Image Profile
                                </button>



                                <!-- edit -->
                                <div class="modal fade" id="updateprofile"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="POST" id="add-form" action= "{{route('profile.update',1)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Full Name</label>
                                                        <input type="text" required name="name" class="form-control" id="name">
                                                    </div>
                                                        @error('name')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror

                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label">Email</label>
                                                        <input type="email" required name="email" class="form-control" id="email">
                                                        @error('email')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="mobile" class="col-form-label">Mobile</label>
                                                        <input type="text" required  name="mobile" class="form-control" id="mobile">
                                                        @error('mobile')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="col-form-label">Password</label>
                                                        <input type="password" name="password"  class="form-control">
                                                        @error('password')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="status" class="col-form-label">Status</label>
                                                        <select  name="status" required  class="form-control">

                                                            <option  @if($user->status == 1) ? selected : null @endif  value="1" >Active</option>
                                                            <option  @if($user->status == 0) ? selected : null @endif value="0"  >Disable</option>
                                                        </select>
                                                        @error('status')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="receive_email" class="col-form-label">Recive Email</label>
                                                        <select  name="receive_email"  required  class="form-control" >
                                                            <option @if($user->receive_email == 1) ? selected : null @endif value="1" >Active</option>
                                                            <option @if($user->receive_email == 0) ? selected : null @endif value="0">Disable</option>

{{--                                                            <option {{ $user->receive_email=="1" ? "selected" : ''}} value="1">active</option>--}}
{{--                                                            <option  {{ $user->receive_email=="0" ? "selected" : ''}}valeu="0">Disable</option>--}}
                                                        </select>
                                                        @error('receive_email')
                                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                                        @enderror
                                                    </div>



{{--                                                    <div class="form-group">--}}
{{--                                                        <div class="file-field input-field">--}}
{{--                                                            <div class="btn">--}}
{{--                                                                <span> رفع صورة العضو </span>--}}
{{--                                                                <p>480 × 600 px مقاس الصورة</p>--}}
{{--                                                                <input type="file"   name="image" accept="image/*" onchange="loadFile_edit(event)">--}}
{{--                                                                @error('image')--}}
{{--                                                                <span class ='help-block text-danger'>{{ $message }}</span>--}}
{{--                                                                @enderror--}}
{{--                                                            </div>--}}
{{--                                                            <div class="file-path-wrapper">--}}
{{--                                                                <img  style="float: left" height="100" width="100" id="output_edit"/>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="modal-footer float-right">
                                                        <button type="submit" class="btn btn-primary float-right">Update</button>

                                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- upload image -->
                                <div class="modal fade" id="uploadimage"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="POST" id="add-form" action= "{{route('admin.update_image',1)}}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <div class="file-field input-field">
                                                            <div class="btn">
                                                                <span>Upload image </span>
                                                                <p>100 × 100 px Size Image</p>
                                                                <input type="file"   name="user_image" accept="image/*" onchange="loadFile_edit(event)">
                                                                @error('user_image')
                                                                <span class ='help-block text-danger'>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <img  style="float: left" height="100" width="100" id="output_edit"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer float-right">
                                                        <button type="submit" class="btn btn-primary float-right">Update</button>

                                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="card-block">
                                <div class="view-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Full Name
                                                                    </th>
                                                                    <td>{{auth()->user()->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Status</th>
                                                                    <td>
                                                                        {{$user->status()}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Receive Email                                                                    </th>
                                                                    <td>
                                                                        {{$user->Recive_email()}}
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Email</th>
                                                                    <td><a href="#!"><span class="__cf_email__" data-cfemail="98dcfdf5f7d8fde0f9f5e8f4fdb6fbf7f5">{{auth()->user()->email}}</span></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        Mobile
                                                                        Number</th>
                                                                    <td>(0123) -
                                                                        4567891</td>
                                                                </tr>

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

    </div>
    </div>


    <div id="styleSelector">

    </div>
@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    </script>
    <script>
        var loadFile_edit = function(event) {
            var output = document.getElementById('output_edit');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
<script>

    // Model Edit
    $('#updateprofile').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)

        var name = button.data('name')
        var email = button.data('email')
        var mobile = button.data('mobile')
        var status = button.data('status')
        var receive_email = button.data('receive_email')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #mobile').val(mobile);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #receive_email').val(receive_email);


    })
    // Model Edit
    $('#uploadimage').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)

        var name = button.data('name')
        var email = button.data('email')
        var mobile = button.data('mobile')
        var status = button.data('status')
        var receive_email = button.data('receive_email')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #mobile').val(mobile);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #receive_email').val(receive_email);


    })

</script>

@stop

@endsection
