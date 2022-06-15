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
                    <h4> New Customer</h4>
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
                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Create</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Create New Customer</h6>
            <div class="ml-auto">
                <a  type="button" href="{{route('customer.index')}}"  data-effect="effect-scale"
                    class="btn btn-sm btn-primary waves-effect waves-light f-right" >
                    <i class="icofont icofont-home"></i>
                </a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::open(['route' => 'customer.store', 'method' => 'post', 'files' => true]) !!}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('mobile', 'Mobile') !!}
                        {!! Form::text('mobile', old('mobile'), ['class' => 'form-control']) !!}
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Re-Password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('status', 'status') !!}
                        {!! Form::select('status', ['' => '---', '1' => 'active', '0' => 'Inactive', ],old('status'), ['class' => 'form-control']) !!}
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('near', 'near') !!}
                        {!! Form::select('near', ['' => '---', '1' => 'active', '0' => 'Inactive', ],old('near'), ['class' => 'form-control']) !!}
                        @error('near')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

            <div class="row">
{{--                <div class="col-6">--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('bio', 'Bio') !!}--}}
{{--                        {!! Form::textarea('bio', old('bio'), ['class' => 'form-control']) !!}--}}
{{--                        @error('bio')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-6">
                    {!! Form::label('Customer Image', 'customer_image') !!}
                    <br>
                    <div class="file-loading">
                        {!! Form::file('customer_image', ['id' => 'customer-image', 'class' => 'file-input-overview']) !!}
                        <span class="form-text text-muted">Image width should be 100px x 100px</span>
                        @error('customer_image')<span class="text-danger">{{ $message }}</span>@enderror
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
@endsection
@endsection
