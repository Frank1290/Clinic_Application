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
<!-- {{$countRows}} -->
@if(session()->has('LoggedUser'))

@else
<script>
    window.location.href = "{{url('')}}";
</script>


@endif
@if ($countRows>0)
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update Hospital Details </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Hospital</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('update_details',$getHospitalDetails[0]['id'])}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Hospital Name:</label>
                            <input type="text" class="form-control" name="hospital_name" required="Please Enter Hospital name" value="{{$getHospitalDetails[0]['hospital_name']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Logo:</label><br>
                            <input type="file" name="hospital_logo">
                            <input type="hidden" class="form-control" name="old_logo" value="{{$getHospitalDetails[0]['hospital_logo']}}">
                            <img src="{{url('logo/',$getHospitalDetails[0]['hospital_logo'])}}" style="height: 100px;width: 100px;">


                        </div>
                        <div class="form-group col-md-6">
                            <label>DR Name:</label>
                            <input type="text" class="form-control" name="dr_name" required="" value="{{$getHospitalDetails[0]['dr_name']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Qualification:</label>
                            <input type="text" class="form-control" name="qualification" required="" value="{{$getHospitalDetails[0]['qualification']}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Address 1:</label>
                            <input type="text" class="form-control" name="address_1" required="" value="{{$getHospitalDetails[0]['address_1']}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Address 2:</label>
                            <input type="text" class="form-control" name="address_2" required="" value="{{$getHospitalDetails[0]['address_2']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number 1:</label>
                            <input type="text" class="form-control" name="contact_1" required="" value="{{$getHospitalDetails[0]['contact_1']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number 2:</label>
                            <input type="text" class="form-control" name="contact_2" required="" value="{{$getHospitalDetails[0]['contact_2']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email ID:</label>
                            <input type="text" class="form-control" name="email_id" required="" value="{{$getHospitalDetails[0]['email']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Regd No:</label>
                            <input type="text" class="form-control" name="regd_no" required="" value="{{$getHospitalDetails[0]['regd_no']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Time 1:</label>
                            <textarea rows="1" cols="40" name="timing_1" required="">{{$getHospitalDetails[0]['timing_1']}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Time 2:</label>
                            <textarea rows="1" cols="40" name="timing_2" required="">{{$getHospitalDetails[0]['timing_2']}}</textarea>
                        </div>

                    </div>
                    <div style="text-align: center;">
                        <button type="submit" name="save" class="btn btn-warning">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</main>

@else
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Hospital Details </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Hospital</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('save_details')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Hospital Name:</label>
                            <input type="text" class="form-control" name="hospital_name" required="Please Enter Hospital name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Logo:</label><br>
                            <input type="file" name="hospital_logo">
                        </div>
                        <div class="form-group col-md-6">
                            <label>DR Name:</label>
                            <input type="text" class="form-control" name="dr_name" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Qualification:</label>
                            <input type="text" class="form-control" name="qualification" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Address 1:</label>
                            <input type="text" class="form-control" name="address_1" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Address 2:</label>
                            <input type="text" class="form-control" name="address_2" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number 1:</label>
                            <input type="text" class="form-control" name="contact_1" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number 2:</label>
                            <input type="text" class="form-control" name="contact_2" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email ID:</label>
                            <input type="text" class="form-control" name="email_id" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Regd No:</label>
                            <input type="text" class="form-control" name="regd_no" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Time 1:</label>
                            <textarea rows="1" cols="40" name="timing_1" required=""></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hospital Time 2:</label>
                            <textarea rows="1" cols="40" name="timing_2" required=""></textarea>
                        </div>

                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                   
                </form>
            </div>
        </div>

    </div>
</main>
@endif

@endsection
@section('scripts')
@include('../includes.scripts')
@endsection