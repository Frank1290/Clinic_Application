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
        <h1 class="mt-4">Update Medicine</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Medicine</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @foreach($medicines as $medicine)
                <form action="{{url('medicine_update')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Update Medicine:</label>
                            <input type="hidden" class="form-control" name="id" value="{{$medicine
                            ->id}}">
                            <input type="text" class="form-control" name="medicine_name" value="{{$medicine->medicine_name}}">
                        </div>
                        <div class="form-group col-md-6">

                        </div>
                        <button type="submit" name="save" class="btn btn-primary">Update</button>
                </form>
                @endforeach
            </div>
        </div>

    </div>

    <div class="card mb-4">


    </div>
    </div>
</main>
@endsection
@section('scripts')
@include('../includes.scripts')
@endsection