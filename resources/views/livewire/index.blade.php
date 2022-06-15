@extends('layouts.app-dashboard')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body  ">
{{--            <img src="{{asset('chat/chatall.jpg')}}" class="center-block" style="width: 47%; margin-left: -70px;">--}}

            <div class="page-wrapper">
                <div id="main-chat" class="container-fluid">

                    <div class="page-header">
                        <div class="row align-items-end">

                            <div class="col-lg-8">

                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Customer  Support</h4>
                                        <span>Communicate with clients</span>

                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="../index.html"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item" style="float: left;"><a href="#!">Pages</a>
                                        </li>
                                        <li class="breadcrumb-item" style="float: left;"><a href="#!">Sample page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="chat-box">
                                <ul class="text-right boxs">
                                    <li class="chat-single-box card-shadow bg-white active" data-id="1">
                                        <div class="had-container">
                                            <div class="chat-header p-10 bg-gray">
                                                <div class="user-info d-inline-block f-left">
                                                    <div class="box-live-status bg-danger  d-inline-block m-r-10">
                                                    </div>
                                                    <a href="#">Josephin Doe</a>
                                                </div>
                                                <div class="box-tools d-inline-block">
                                                    <a href="#" class="mini">
                                                        <i class="icofont icofont-minus f-20 m-r-10"></i>
                                                    </a>
                                                    <a class="close" href="#">
                                                        <i class="icofont icofont-close f-20"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="chat-body p-10">
                                                <div class="message-scrooler">
                                                    <div class="messages">
                                                        <div class="message out no-avatar media">
                                                            <div class="body media-body text-right p-l-50">
                                                                <div class="content msg-reply f-12 bg-primary d-inline-block">
                                                                    Good morning..</div>
                                                                <div class="seen"><i class="icon-clock f-12 m-r-5 txt-muted d-inline-block"></i><span>a
few seconds ago </span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </div>
                                                            <div class="sender media-right friend-box">
                                                                <a href="javascript:void(0);" title="Me"><img src="{{asset('/files/assets/images/avatar-1.jpg')}}" class="  img-chat-profile" alt="Me"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-footer b-t-muted">
                                                <div class="input-group write-msg">
                                                    <input type="text" class="form-control input-value" placeholder="Type a Message">
                                                    <span class="input-group-btn">
<button id="paper-btn" class="btn btn-primary" type="button" style="padding: 6px 12px;">
<i class="icofont icofont-paper-plane"></i>
</button>
</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div id="sidebar" class="users p-chat-user">
                                    <div class="had-container">
                                        <div class="card card_main p-fixed users-main ">
                                            <div class="user-box">
                                                <div class="card-block">
                                                    <div class="right-icon-control">
                                                        <input type="text" class="form-control  search-text" placeholder="Search Friend">
                                                        <div class="form-icon">
                                                            <i class="icofont icofont-search"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-groups">
                                                    <h6>Groups</h6>
                                                    <ul>
                                                        <li class="frnds">Friends</li>
                                                        <li class="work">Work</li>
                                                    </ul>
                                                </div>
                                                <div class="user-groups">
                                                    <h6>Favourites</h6>
                                                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                                        <a class="media-left" href="#!">
                                                            <img class="media-object  " src="{{asset('/files/assets/images/avatar-3.jpg')}}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="f-13 chat-header">Josephin
                                                                Doe</div>
                                                        </div>
                                                    </div>
                                                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                                        <a class="media-left" href="#!">
                                                            <img class="media-object  " src="{{asset('/files/assets/images/task/task-u1.jpg')}}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="f-13 chat-header">ahmed
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($customers as $customer)
                                                <div class="media userlist-box" data-id="1" data-status="online" data-username="{{$customer->name}}" data-toggle="tooltip" data-placement="left" title="{{$customer->name}}">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object  " src="{{asset('files/assets/customer/'.$customer->customer_image)}}" alt="Generic placeholder image">
                                                        <div class="live-status bg-success"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="f-13 chat-header">{{$customer->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                                <div class="media userlist-box" data-id="15" data-status="online" data-username="Lary" data-toggle="tooltip" data-placement="left" title="Lary">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object  " src="{{asset('../files/assets/images/task/task-u1.jpg')}}" alt="Generic placeholder image">
                                                        <div class="live-status bg-success"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="f-13 chat-header">Lary</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-error">
                        <div class="card text-center">
                            <div class="card-block">
                                <div class="m-t-10">
                                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                                    <p class="text-muted m-b-0">Chat not supported in this device
                                    </p>
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
</div>
    @section('script')

        <script src="{{asset('files/assets/pages/chat/js/mmc-common.js')}}"></script>
        <script src="{{asset('files/assets/pages/chat/js/mmc-chat.js')}}"></script>
        <script type="text/javascript" src="{{asset('files/assets/pages/chat/js/chat.js')}}"></script>
    @endsection
@endsection
