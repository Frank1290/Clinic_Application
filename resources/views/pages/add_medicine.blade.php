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
        <h1 class="mt-4">Add Medicine</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Medicine</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('medicines')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Add Medicine:</label>
                            <input type="text" class="form-control" name="medicine_name">
                        </div>
                        <div class="form-group col-md-6">

                        </div>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>

    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Medicine Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>


                    <tbody>

                        <?php $sr = 1; ?>
                        @foreach($medicines as $medicine)


                        <tr>
                            <td>{{$sr}}</td>
                            <td>{{$medicine->medicine_name}}</td>
                            <td>
                                <a href="{{url('update_medicine',$medicine->id)}}"><button style="font-size:24px" onclick="return confirm('Do you want to edit this Medicine Name ?');"><i class="fa fa-edit"></i></button></a>
                                <a href="{{url('delete_medicine',$medicine->id)}}"><button style="font-size:24px" onclick="return confirm('Do you want to delete this Medicine Name ?');"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>

                        <?php $sr++ ?>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
@section('scripts')
@include('../includes.scripts')
@endsection