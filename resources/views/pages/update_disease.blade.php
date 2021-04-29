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
        <h1 class="mt-4">Add Disease</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Disease</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-body">
                    @foreach($diseases as $disease)
                    <form method="post" action="{{url('disease_update')}}">@csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Disease Name</label>
                                <input type="hidden" class="form-control" name="id" value="{{$disease->id}}">
                                <input type="text" class="form-control" name="disease_name" value="{{$disease->disease_name}}">
                            </div>

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