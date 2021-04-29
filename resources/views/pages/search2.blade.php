<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h4 class="text-center">Autocomplete Search Box with <br> Laravel + Ajax + jQuery</h4>
                <hr>
                <div class="form-group">
                    <label>Type a country name</label>
                    <input type="text" name="patient" id="patient" placeholder="Enter patient name" class="form-control">
                </div>
                <div id="patient_list"></div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // jQuery wait till the page is fullt loaded
        $(document).ready(function() {
            // keyup function looks at the keys typed on the search box
            $('#patient').on('keyup', function() {
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
                // assign the value to the search box
                $('#patient').val(value);
                // after click is done, search results segment is made empty
                $('#patient_list').html("");
            });
        });
    </script>
</body>

</html>