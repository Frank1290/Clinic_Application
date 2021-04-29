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
        <h1 class="mt-4">Add Payment Details </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Payment</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <?php
                $currentDate = date('d-m-Y');

                ?>
                <form action="{{url('save_payment')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Patient Name:</label>
                            <input type="hidden" class="form-control" name="patient_id" required="" value="{{$patient_details->id}}" readonly>

                            <input type="text" class="form-control" name="patient_name" required="" value="{{$patient_details->patient_name}}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Date:</label>
                            <input type="text" class="form-control" name="date_of_payment" required="" value="{{$currentDate}}" readonlys>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mode Of Payment:</label>
                            <select name="payment_mode">
                                <option value="not selected">SELECT MODE</option>
                                <option value="cash">CASH</option>
                                <option value="card">CARD</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label>Dr Fees:</label>
                            <input type="text" class="form-control" name="payment_amount" required="">
                        </div>




                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Save And Print</button>

                </form>
            </div>
        </div>

    </div>
</main>
@endsection
@section('scripts')
@include('../includes.scripts')
@endsection