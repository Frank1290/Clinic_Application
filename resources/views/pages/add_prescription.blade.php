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
        <h1 class="mt-4">Add Prescription </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Hospital</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('save_prescription')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            Date : <?php echo date('d-m-Y'); ?>
                        </div>

                        <div class="form-group col-md-6"></div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="patient_name" placeholder="Enter Patient Name" id="new_patient">
                            <!-- <select class="form-control" id="old_patient" name="patient_id" onchange="get_old_patient_details(this.value)"> -->
                            <input type="text" name="patient_id" id="old_patient" placeholder="Search patient name" class="form-control">


                            <script type="text/javascript">
                                // jQuery wait till the page is fullt loaded
                                $(document).ready(function() {
                                    // keyup function looks at the keys typed on the search box
                                    $('#old_patient').on('keyup', function() {
                                        // the text typed in the input field is assigned to a variable 
                                        var query = $(this).val();


                                        // call to an ajax function
                                        $.ajax({
                                            // assign a controller function to perform search action - route name is search
                                            url: "{{url('autosearch')}}",
                                            // since we are getting data method is assigned as GET
                                            type: "GET",
                                            // data are sent the server
                                            data: {
                                                'patient': query
                                            },
                                            // if search is succcessfully done, this callback function is called
                                            success: function(data) {
                                                // print the search results in the div called country_list(id)
                                                $('#patient_list').html(data);
                                            }
                                        })


                                        // end of ajax call
                                    });


                                    // initiate a click function on each search result
                                    $(document).on('click', 'li', function() {
                                        // declare the value in the input field to a variable
                                        var value = $(this).text();
                                        var id = $(this).attr('id');
                                        // console.log(id);
                                        // assign the value to the search box
                                        $('#old_patient').val(value);
                                        get_old_patient_details(id);
                                        // after click is done, search results segment is made empty

                                        $('#patient_list').html("");

                                    });
                                });
                            </script>


                            <script>
                                function get_old_patient_details(patient_name) {
                                    // console.log("Id" + patient_id);
                                    document.getElementById("divResults").innerHTML = "";



                                    fetch(`http://localhost:8000/get_medical_history/${patient_name}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            // console.log(data);
                                            // console.log(data[0].concat(data[1]).concat(data[2]));
                                            const patient = data[0][0];
                                            const prescription = data[1][0];
                                            const medicalDetail = data[2];
                                            console.log(medicalDetail);


                                            medicalDetail.forEach((medicine) => {

                                                // console.log(medicine);
                                                // document.getElementById('divResults').html('');


                                                var html = '<table>';
                                                html += '<tr><td>' + medicine.medicine_name + '</td><td>' + medicine.days + '</td><td>' + medicine.quantity + '</td></tr>';


                                                html += '</table>';

                                                document.getElementById("divResults")
                                                    .insertAdjacentHTML("beforeend", html);

                                            })



                                            const genderEnum = {
                                                Male: 0,
                                                Female: 1,
                                                Other: 2
                                            };
                                            for (key in patient) {
                                                // console.log(patient);
                                                // console.log(key);
                                                // console.log(patient[key]);
                                                if (key === 'gender') {
                                                    const genderNumber = (genderEnum[patient[key]]);
                                                    document.getElementsByName(key)[genderNumber].checked = true;

                                                } else {
                                                    document.getElementById(key).value = patient[key];
                                                }

                                            }
                                            for (key in prescription) {
                                                // console.log(prescription);
                                                // console.log(key);
                                                // console.log(prescription[key]);
                                                document.getElementById(key).value = prescription[key];

                                            }







                                        });


                                }
                            </script>
                            <div id="patient_list"></div>



                        </div>

                        <div class="form-group col-md-6">
                            <input type="radio" name="patient_type" checked id="new_check" id="new_check" value="new">New Patient
                            <input type="radio" name="patient_type" id="old_check" id="old_check" value="old">Old Patient
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#old_patient').hide();
                                $('#historyToggle').hide();
                            })

                            $(document).ready(function() {
                                $('#old_check').click(function() {
                                    $('#old_patient').show();
                                    $('#historyToggle').show();
                                    $('#new_patient').hide();
                                })
                            })

                            $(document).ready(function() {
                                $('#new_check').click(function() {
                                    $('#old_patient').hide();
                                    $('#historyToggle').hide();
                                    $('#new_patient').show();
                                })
                            })
                        </script>



                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" id="patient_mobile" name="patient_mobile" placeholder="Enter Mobile" maxlength="10" id="patient_mobile" required>
                        </div>
                        <div class="form-group col-md-3">

                            <input type="radio" name="gender" value="Male" id="gender">Male
                            <input type="radio" name="gender" value="Female" id="gender">Female
                            <input type="radio" name="gender" value="Other" id="gender">Other

                        </div>

                        <div class="form-group col-md-3">

                            <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age" step="1" min="1" id="age" required>
                        </div>

                        <div class="form-group col-md-3">

                            <input type="text" class="form-control" name="bld_grp" id="blood_group" placeholder="Enter Blood Group" id="bld_grp" required>
                        </div>
                        <div class="form-group col-md-3">

                            <input type="text" class="form-control" name="bld_pressure" id="blood_pressure" placeholder="Enter Blood Pressure" required>
                        </div>
                        <div class="form-group col-md-3">

                            <input type="text" class="form-control" name="sugar" id="sugar" placeholder="Enter Sugar" required>
                        </div>

                        <div class="form-group col-md-3">

                            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight" required>
                        </div>
                        <div class="form-group col-md-6">

                            <select class="form-control" name="disease_name" required>
                                <option value="">Select Disease</option>
                                @foreach($diseases as $disease)
                                <option value="{{$disease->disease_name}}">{{$disease->disease_name}}</option>
                                @endforeach

                            </select>


                        </div>

                        <div class="form-group col-md-6">
                            <textarea type="editor" class="form-control" name="symptoms" placeholder="Enter Symptoms" required></textarea>


                        </div>
                        <div class="form-group col-md-12" id="historyToggle">
                            <b>
                                <p style="text-align: center;">Patient Medication History</p>
                            </b>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Previous Medication</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">No Of Days</th>

                                    </tr>
                                </thead>
                                <tbody id="divResults">



                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div id="add_more_div">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Medicine Name:</label>
                                <select class="form-control" name="medicine_name[]" required>
                                    <option value="">Select Medicine</option>
                                    @foreach($medicines as $medicine)
                                    <option value="{{$medicine->medicine_name}}">{{$medicine->medicine_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Quantity:</label>
                                <input type="text" class="form-control" name="quantity[]" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>When To Take:</label>
                                <select class="form-control" name="when_to_take[]" required>
                                    <option>When To Take</option>
                                    <option value="1-1-1">1-1-1</option>
                                    <option value="1-0-1">1-0-1</option>
                                    <option value="0-0-1">0-0-1</option>
                                    <option value="1-0-0">1-0-0</option>
                                    <option value="0-1-0">0-1-0</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Before/After Medi:</label>
                                <select class="form-control" name="before_after[]" required>
                                    <option>Before/After Meal</option>
                                    <option value="before_meal">Before Meal(जेवण करण्यापूर्वी)</option>
                                    <option value="after_meal">After Meal(जेवणानंतर)</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Days:</label>
                                <input type="text" class="form-control" name="days[]" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Add:</label><br>
                                <button class="btn btn-info" onclick="add_more_func()" type="button">+</button>
                            </div>
                        </div>

                    </div>


                    <script>
                        function add_more_func() {
                            //alert(51);
                            var new_field_no = $('input[name="medicine_name[]"]').length + 1;
                            var data = '<div class="row"><div class="form-group col-md-2"><label>Medicine Name:</label><select class="form-control" name="medicine_name[]" ><option value="">Select</option>';
                            <?php
                            foreach ($medicines as $medicine) {
                            ?>
                                data += '<option value="<?php echo $medicine->medicine_name; ?>"><?php echo $medicine->medicine_name; ?></option>';
                            <?php
                            }
                            ?>

                            data += '</select></div><div class="form-group col-md-2"><label>Quantity:</label><input type="text" class="form-control" name="quantity[]" ></div><div class="form-group col-md-2"><label>When To Take:</label><select class="form-control" name="when_to_take[]" ><option>When To Take</option><option value="1-1-1">1-1-1</option><option value="1-0-1">1-0-1</option><option value="0-0-1">0-0-1</option><option value="1-0-0">1-0-0</option><option value="0-1-0">0-1-0</option></select></div><div class="form-group col-md-2"><label>Before/After Medi:</label><select class="form-control" name="before_after[]" ><option>Before/After Meal</option><option value="before_meal">Before Meal(जेवण करण्यापूर्वी)</option><option value="after_meal">After Meal(जेवणानंतर)</option></select></div><div class="form-group col-md-2"><label>Days:</label><input type="text" class="form-control" name="days[]" ></div><div class="form-group col-md-2"><label>Add:</label><br><button class="btn btn-info" onclick="add_more_func()" type="button">+</button></div>';
                            $("#add_more_div").append(data);
                        }
                    </script>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
@endsection
@section('scripts')
@include('../includes.scripts')
@endsection