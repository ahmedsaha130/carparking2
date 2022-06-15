
<div wire:poll>
    Current time: {{ now() }}


    <div class="page-body">
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-yellow update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">{{count($busy_count)}}</h4>
                                <h6 class="text-white m-b-0">All Busy</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i
                                class="feather icon-clock text-white f-14 m-r-10"></i>update
                            : {{date('h:i a',time())}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-green update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">{{count($reservation_count)}}</h4>
                                <h6 class="text-white m-b-0">All Reservation</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i
                                class="feather icon-clock text-white f-14 m-r-10"></i>update
                            : 2:15 am</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-pink update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">{{count($cancel_count)}}</h4>
                                <h6 class="text-white m-b-0">All Cancel</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-3" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i
                                class="feather icon-clock text-white f-14 m-r-10"></i>update
                            : 2:15 am</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-lite-green update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">{{count($complement_count)}}</h4>
                                <h6 class="text-white m-b-0"> All Complement</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-4" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i
                                class="feather icon-clock text-white f-14 m-r-10"></i>update
                            : 2:15 am</p>
                    </div>
                </div>
            </div>


            <div class="col-xl-9 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sales Analytics</h5>
                        <span class="text-muted">For more details about usage, please
refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="feather icon-maximize full-card"></i></li>
                                <li><i class="feather icon-minus minimize-card"></i>
                                </li>
                                <li><i class="feather icon-trash-2 close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div id="sales-analytics" style="height: 265px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-12">
                <div class="card user-card2">
                    <div class="card-block text-center">
                        <h6 class="m-b-15">Project Risk</h6>
                        <div class="risk-rate">
                            <span><b>5</b></span>
                        </div>
                        <h6 class="m-b-10 m-t-10">Balanced</h6>
                        <a href="#!" class="text-c-yellow b-b-warning">Change Your
                            Risk</a>
                        <div
                            class="row justify-content-center m-t-10 b-t-default m-l-0 m-r-0">
                            <div class="col m-t-15 b-r-default">
                                <h6 class="text-muted">Nr</h6>
                                <h6>AWS 2455</h6>
                            </div>
                            <div class="col m-t-15">
                                <h6 class="text-muted">Created</h6>
                                <h6>30th Sep</h6>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-block p-t-15 p-b-15">Download
                        Overall Report
                    </button>
                </div>
            </div>

            <div class="col-xl-8 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Last Reservation</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="feather icon-maximize full-card"></i></li>
                                <li><i class="feather icon-minus minimize-card"></i>
                                </li>
                                <li><i class="feather icon-trash-2 close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover  table-borderless">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="chk-option">
                                            <div class="checkbox-fade fade-in-primary">

                                            </div>
                                        </div>
                                        Number
                                    </th>
                                    <th>Customer</th>
                                    <th>Interval</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reservations as $reservation)
                                    <tr>
                                        <td>
                                            <div class="chk-option">
                                                <div class="checkbox-fade fade-in-primary">

                                                </div>
                                            </div>
                                            <div class="d-inline-block align-middle">
                                                <h6>{{$reservation->number}}</h6>

                                            </div>
                                        </td>
                                        <td>{{$reservation->customers->name}}</td>
                                        <td>
                                            {{$reservation->intervals->start}}-{{$reservation->intervals->end}}
                                        </td>
                                        @if($reservation->status() =='reserved')

                                            <td><span class="label label-success"> {{$reservation->status()}}</span></td>
                                        @elseif($reservation->status() =='canceled')
                                            <td><span class="label label-danger"> {{$reservation->status()}}</span></td>
                                        @elseif($reservation->status() =='finished')
                                            <td><span class="label label-info"> {{$reservation->status()}}</span></td>

                                        @else
                                            <td><span class="label label-warning"> {{$reservation->status()}}</span></td>
                                        @endif                                    <td class="text-c-blue">$15,652</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td> No Recorders</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card user-activity-card">
                    <div class="card-header">
                        <h5>Last Customers</h5>
                    </div>
                    <div class="card-block">
                        @forelse($customers as $customer)
                            <div class="row m-b-25">
                                <div class="col-auto p-r-0">
                                    <div class="u-img">
                                        <img src="{{{asset('files/assets/images/breadcrumb-bg.jpg')}}}"
                                             alt="user image" class="img-radius cover-img">
                                        <img src="{{asset('files/assets/images/avatar-2.jpg')}}"
                                             alt="user image" class="img-radius profile-img">
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="m-b-5">{{$customer->name}}</h6>
                                    <p class="text-muted m-b-0">{{$customer->email}}</p>
                                    <p class="text-muted m-b-0"><i
                                            class="feather icon-clock m-r-10"></i>{{$customer->created_at}}
                                    </p>
                                </div>
                            </div>

                        @empty
                            <div class="row m-b-25">

                                <div class="col">
                                    <h6 class="m-b-5">No Customers</h6>

                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-md-6">
                <div class="card social-card bg-simple-c-blue">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-user f-34 text-c-blue social-icon"></i>
                            </div>
                            <div class="col">
                                <h5 class="m-b-0">Customer</h5>
                                <h2 class="m-b-0">{{count($customers)}}</h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('customer.index')}}" class="download-icon"><i
                            class="feather icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card social-card bg-simple-c-pink">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-map f-34 text-c-pink social-icon"></i>
                            </div>
                            <div class="col">
                                <h5 class="m-b-0">Parks</h5>
                                <h2 class="m-b-0"> {{count($parks)}}</h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('park.index')}}" class="download-icon"><i
                            class="feather icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card social-card bg-simple-c-green">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-clock f-34 text-c-green social-icon"></i>
                            </div>
                            <div class="col">
                                <h5 class="m-b-0">Reservations</h5>
                                <h2 class="m-b-0">{{count($reservations_all)}}</h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('reservation.index')}}" class="download-icon"><i
                            class="feather icon-arrow-down"></i></a>
                </div>
            </div>

        </div>
    </div>
{{now()}}
</div>

