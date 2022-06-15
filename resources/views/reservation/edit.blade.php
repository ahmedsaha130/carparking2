@extends('layouts.app-dashboard')

@section('content')
    <style>
        form.form  label.error, label.error {

            color: #F00;
            font-style: italic;
        }
        .timepicker,.icons {

            background: #fff;
            color: #0a6aa1;
        }
    </style>
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4> Edit Park</h4>
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
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Parking</a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.flash')

    <div class="page-body">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">Update Parking</h6>
                <div class="ml-auto">
                    <a  type="button" href="{{route('park.index')}}"  data-effect="effect-scale"
                        class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                        <i class="icofont icofont-home"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">

                {!! Form::model($park, ['route' => ['park.update', $park->id], 'method' => 'patch', 'files' => true]) !!}
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', old('name',$park->name), ['class' => 'form-control','placeholder'=>'PR-']) !!}
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            {!! Form::label('number', 'Number') !!}
                            {!! Form::text('number', old('number',$park->number), ['class' => 'form-control']) !!}
                            @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group timepicker">
                            <span class="fa fa-clock-o"></span>
                            {!! Form::label('start_time_sensor', 'Start time (Sensor)') !!}
                            {!! Form::text('start_time_sensor', old('start_time_sensor',date('H:i',$park->start_time_sensor)), ['class' => 'form-control icons','readonly']) !!}
                            <span class="input-group-addon">
					            </span>
                            @error('start_time_sensor')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group timepicker">
                            <span class="fa fa-clock-o"></span>
                            {!! Form::label('end_time_sensor', 'End time (Sensor)') !!}
                            {!! Form::text('end_time_sensor', old('end_time_sensor',date('H:i',$park->end_time_sensor)), ['class' => 'form-control','readonly']) !!}
                            @error('end_time_sensor')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-3">
                        <div class="form-group">
                            {!! Form::label('status', 'status') !!}
                            {!! Form::select('status', ['' => '---', '1' => 'active', '0' => 'Inactive', ],old('status',$park->status), ['class' => 'form-control']) !!}
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('note', 'Note') !!}
                            {!! Form::textarea('note', old('note',$park->note), ['class' => 'form-control']) !!}
                            @error('note')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>


                </div>

                <div class="form-group pt-4">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
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
            var optionsDatetime = $.extend({}, defaults, {format:'DD-MM-YYYY HH:mm'});
            var optionsDate = $.extend({}, defaults, {format:'DD-MM-YYYY'});
            var optionsTime = $.extend({}, defaults, {format:'HH:mm'});

            $('.datepicker').datetimepicker(optionsDate);
            $('.timepicker').datetimepicker(optionsTime);
            $('.datetimepicker').datetimepicker(optionsDatetime);
        });
    </script>
@endsection
@endsection
