<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            w = window.open();
            w.document.write(printContents);
            w.print();
            w.close();
        }
    </script>

    <style>
        .container {
            margin-left: 50px;
            margin-right: 50px;
            margin-top: 50px;

        }

        .printable {
            padding: 20px;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <div class="container" id="print_container">


        <div class="printable">
            {!! html_entity_decode($formdata) !!}

            <br><br><br>
            <img src="{{ URL::asset('/images/verfied.png') }}" alt="profile Pic" height="100px" width="100px">
            <h5>Verified Token <br> {{ Str::upper($token) }}</h5>

        </div>

        <br><br><br>


    </div>
    <input type="button" onclick="window.print()" value="PRINT" />
</body>

</html>
