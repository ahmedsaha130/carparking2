<style>

    form.form  label.error, label.error {

        color: #F00;
        font-style: italic;
    }
</style>

@if (session()->has('add'))


    <script>
        window.onload = function() {
            notif({
                msg: "Added Successfully",
                type: "success"
            })
        }
    </script>

@endif
@if (session()->has('archive'))


    <script>
        window.onload = function() {
            notif({
                msg: "Added archive Successfully",
                type: "success"
            })
        }
    </script>

@endif
@if (session()->has('archive_update'))


    <script>
        window.onload = function() {
            notif({
                msg: "Restore Customer Successfully",
                type: "success"
            })
        }
    </script>

@endif
@if (session()->has('error'))


    <script>
        window.onload = function() {
            notif({
                msg: "Something Error",
                type: "error"
            })
        }
    </script>

@endif

@if (session()->has('edit'))


    <script>
        window.onload = function() {
            notif({
                msg: "Updated Successfully",
                type: "success"
            })
        }
    </script>

@endif

@if (session()->has('delete'))


    <script>
        window.onload = function() {
            notif({
                msg: "Deleted Successfully",
                type: "success"
            })
        }
    </script>




@endif

<div class="page-header">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> Failed System :{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        @if(session('message'))


            <div class="alert alert-{{session('alert-type')}} alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
@endif
