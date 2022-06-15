@extends('layouts.app-dashboard')
@section('content')
@section('style')

    <style>

        form.form  label.error, label.error {

            color: #F00;
            font-style: italic;
        }
    </style>
@endsection

<div class = 'row justify-content-center'>

        <div class="col-12">

            <div class = 'card'>

                <div class = 'card-header'>
                </div>
                <div class ='card-body'>
                    @include('layouts.flash')

                    <form action ="{{ route('interval.store') }}"  method ='POST'>
                        @csrf

                        <div class="table-responsive">

                            <table class="table" id="interval_details">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start(interval)</th>
                                    <th>End(interval)</th>
                                    <th>Status</th>
                                    <th>Count(interval)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="cloning_row" id="0">
                                    <td>#</td>


                                    <td>
                                        <input type="number" required name="start[0]" step="1"id="start"class="start form-control" data-validetta="required" > </td>
                                    @error('start')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror

                                    </td>
                                    <td>
                                        <input type="number" required name="end[0]"step="1" id="end"class="end form-control" data-validetta="required" > </td>
                                    @error('end')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                    </td>
                                    <td>
                                        <select name="status[0]" required  data-validetta="required" id="status" class="status form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Disable</option>

                                        </select>
                                        @error('status')
                                        <span class ='help-block text-danger'>{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" required data-validetta="required" value="{{$count_parks}}" step="1" name="count[0]" id="count"class="count form-control" readonly='readonly' > </td>
                                    @error('count')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-primary"> Add New Interval</button>
                                    </td>

                                </tr>

                                </tfoot>
                            </table>

                        </div>
                        <div class="text-right pt-3">

                            <button type="submit" name="save" class="btn btn-primary">{{ __('Save')}}</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>


    </div>

    </div>
    @section('script')

        <script type="text/javascript" src="{{ asset('files/assets/form_validation/jquery.form.js') }}"></script>
        <script type="text/javascript" src="{{ asset('files/assets/form_validation/additional-methods.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('files/assets/form_validation/jquery.validate.js') }}"></script>

<script>


    $('form').on('submit', function (e) {
        $('input.start').each(function () { $(this).rules("add", { required: true }); });
        $('select.status').each(function () { $(this).rules("add", { required: true }); });
        $('input.end').each(function () { $(this).rules("add", { required: true }); });
        $('input.count').each(function () { $(this).rules("add", { required: true }); });
        e.preventDefault();
    });

        $(document).on('click', '.btn_add', function () {
        let trCount = $('#interval_details').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#interval_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;

        $('#interval_details').find('tbody').append($('' +
        '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +

            '<td><input type="number" required name="start[' + numberIncr + ']" step="1" class="start form-control"></td>' +
            '<td><input type="number" required name="end[' + numberIncr + ']" step="1" class="end form-control"></td>' +
            '<td><select  required name="status[' + numberIncr + ']" class="status form-control"><option value="1">active</option><option value="0">Disable</option></select></td>' +
            '<td><input type="number" required value="{{$count_parks}}" name="count[' + numberIncr + ']" step="1" class="count form-control" readonly="readonly"></td>' +
            '</tr>'));
        });


    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });

    var $form = $("form"),
        $successMsg = $(".alert");
    $form.validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid: function(e) {
            e.preventDefault();
            $successMsg.show();
        }
    });
        </script>
    @endsection
@endsection
