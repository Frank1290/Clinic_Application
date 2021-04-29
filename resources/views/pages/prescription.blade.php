<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>medical certificate</title>
    <style type="text/css">
        .box1 hr {
            width: 1200px;
            border: 1px solid black;
        }

        .box2 hr {
            width: 400px;
            border: 1px solid black;
        }

        .box3 hr {
            width: 1200px;
            border: 1px solid black;
        }

        .box4 hr {
            width: 1200px;
            border: 1px solid black;
        }

        .box6 hr {
            width: 1200px;
            border: 1px solid black;
        }

        .h11 {
            background-color: #cccccc;
            height: 100%;
        }

        .h11 hr {
            border: 1px dotted black;
            width: 1100px;
            margin-top: 10px;
        }

        .h13 h6 {
            margin-top: -10px;
        }
    </style>
</head>
@if(session()->has('LoggedUser'))

@else
<script>
    window.location.href = "{{url('')}}";
</script>


@endif

<body>

    <div class="container h11">
        <div>
            <h3 style="text-align: center;">
                <img src="{{url('logo/',$hospital_details[0]['hospital_logo'])}}" style="height: 100px;width: 100px;">

            </h3>
        </div>
        <br>
        <div class=" container bg-dark text white text-center mt-1 h12" style="height: 70px;">
            <h3 class="text-center text-white p-3"><b>{{$hospital_details[0]['dr_name']}}</b></h3>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p class="text-center text-black mt-2">{{$hospital_details[0]['address_1']}}<br>{{$hospital_details[0]['timing_1']}}<br>
                    <i class="fa fa-phone">: {{$hospital_details[0]['contact_1']}}</i>
                </p>

            </div>
            <div class="col-sm-4">
                <p class="text-center text-black mt-2">Family Physician & Surgeon<br>Regd. no. {{$hospital_details[0]['regd_no']}}</p>
            </div>
            <div class="col-sm-4">
                <p class="text-center text-black mt-2">{{$hospital_details[0]['address_2']}}<br>{{$hospital_details[0]['timing_2']}} <br>
                    <i class="fa fa-phone">: {{$hospital_details[0]['contact_2']}}</i>
                </p>
            </div>
            <div class="container h13">
                <hr class="new1">
                <h6 class="text-center"><b>Facilities : Vaccinations, Blood Sugar Test, Indoor Admission, Nebulizer, ECG </b></h6>
                <hr class="new1">
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <h2 class="font-weight-bold">Prescribed Medicine</h2>
                </div>
            </div>
            <div class="container ml-4">
                <div class="row mt-4">

                    <p class="text-left text-black ml-5 mt-5">Patient Name : {{$get_patient_details['patient_name']}}<br>Blood Group : {{$get_patient_details['blood_group']}}<br>Blood Pressure :{{ $get_patient_prescription['blood_pressure']}}</p>
                    <p class="text-right text-black mt-5" style="margin-left:40rem">Date:{{date('d-m-Y')}}<br>Age & Sex : {{$get_patient_details['age']}}/{{$get_patient_details['gender']}}<br>Sugar :{{ $get_patient_prescription['sugar']}} <br>Weight : {{ $get_patient_prescription['weight']}}</p>

                </div>




                <table class="table table-bordered text-black mt-5 ">
                    <thead>
                        <tr>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>When to Take</th>
                            <th>Before/After</th>
                            <th>Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_medicine_details as $medicine_detail)
                        <tr>
                            <td>{{$medicine_detail->medicine_name}} </td>
                            <td>{{$medicine_detail->quantity}}</td>
                            <td>{{$medicine_detail->when_to_take}}</td>
                            <td>{{$medicine_detail->before_after}}</td>
                            <td>{{$medicine_detail->days}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <h5 class="text-black text-right mt-5 mr-4">Dr. GAJENDRA GANIGAR</h5>
                <p class="text-black text-right mr-4">(Consulting Doctor)</p>


                <div class="row mt-2">

                </div>
                <div class="row mt-2">

                </div>
                <div class="row mt-2">

                </div>
                <div class="row mt-2">

                </div>
                <div class="row mt-5">
                    <div class="box5">
                    </div>
                </div>
                <div class="row mt-5">

                </div>

            </div>
        </div>
        <div class="footer">
            <div class="row justify-content-center mt-5">
                <button class="col-sm-1 btn btn-primary" onclick="printPrescription()">Print</button>
            </div>
        </div>
        <script>
            function printPrescription() {
                window.print();
                location.href = '/';



            }
        </script>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>