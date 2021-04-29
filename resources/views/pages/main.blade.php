@extends('master/master')
@section('links')
@include('../includes.links')
@endsection
@section('header_nav')
@include('../includes.header_nav')
@endsection
@section('sidebar')
@include('../includes.sidebar')
@endsection
@section('body')
@if(session()->has('LoggedUser'))

@else
<script>
    window.location.href = "{{url('')}}";
</script>


@endif

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        @if(session()->has('success'))
        @endif
        @if(Session::get('success'))
        <span class="text-success">{{Session::get('success')}}<span>
                @endif


                @if ($message = Session::get('update'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <script>
                    function fadeOutSuccess() {
                        setTimeout(function() {
                            $('#successMessage').fadeOut('fast');
                        }, 3000); // <-- time in milliseconds
                    }
                </script>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card  text-white mb-4" style="background-color:#4CD0E1;">
                            <i class="fa fa-calendar-x" aria-hidden="true"></i>

                            <a>
                                <div class="card-body"><a href="add_prescription" style="color: white">Add Patient</a> &nbsp;<i class="fa fa-plus"></i></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    View Patient List
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card text-white mb-4" style="background-color:#AFB42B;">
                            <div class="card-body">Today's Patient &nbsp;<i class="fa fa-users"></i> &nbsp; &nbsp; 95</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                View
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card  text-white mb-4" style="background-color: #424242;">
                            <div class="card-body">Total Payment &nbsp; &nbsp; &nbsp; {{$totalPayment}}</div>



                            <div class="card-footer d-flex align-items-center justify-content-between">
                                View
                            </div>
                        </div>
                    </div>

                </div>

    </div>
</main>
@endsection
@section('scripts')
@include('../includes.scripts')
@endsection