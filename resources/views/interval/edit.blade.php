@extends('layouts.app-dashboard')
@section('content')


<div class = 'row justify-content-center'>

    <div class="col-12">

        <div class = 'card'>

            <div class = 'card-header'>
            </div>
            <div class ='card-body'>
                @include('layouts.flash')

                <form action ="{{ route('interval.update',$interval->id)}}" method="post">
                    @csrf
                    @method('PATCH')
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
                                    <input type="number" required name="start" value="{{old('start',$interval->start)}}" step="1"id="start"class="start form-control" data-validetta="required" > </td>
                                @error('start')
                                <span class ='help-block text-danger'>{{ $message }}</span>
                                @enderror

                                </td>
                                <td>
                                    <input type="number" required name="end" value="{{old('start',$interval->end)}}" step="1" id="end"class="end form-control" data-validetta="required" > </td>
                                @error('end')
                                <span class ='help-block text-danger'>{{ $message }}</span>
                                @enderror
                                </td>
                                <td>
                                    <select name="status" required  data-validetta="required" id="status" class="status form-control">
                                        @if($interval->status == '1')
                                        <option value="1" selected >Active</option>
                                            <option value="0">Disable</option>

                                        @else
                                            <option value="1"  >Active</option>

                                            <option value="0" selected>Disable</option>
                                        @endif
                                    </select>
                                    @error('status')
                                    <span class ='help-block text-danger'>{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" required data-validetta="required" value="{{$count_parks}}" step="1" name="count" id="count"class="count form-control" readonly='readonly' > </td>
                                @error('count')
                                <span class ='help-block text-danger'>{{ $message }}</span>
                                @enderror
                                </td>
                            </tr>
                            </tbody>

                            <tfoot>
{{--                            <tr>--}}
{{--                                <td colspan="6">--}}
{{--                                    <button type="button" class="btn_add btn btn-primary"> Add New Interval</button>--}}
{{--                                </td>--}}

{{--                            </tr>--}}

                            </tfoot>
                        </table>

                    </div>
                    <div class="text-right pt-3">

                        <button type="submit"  class="btn btn-primary">{{ __('Save')}}</button>
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


@endsection
@endsection
