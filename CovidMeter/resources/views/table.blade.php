<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Covid</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
        a {
            text-decoration: none !important;
        }

        .zoom:hover {
            transform: scale(1.2);
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row my-0 mt-3">
            <div class="col-md-8 offset-2 ">
                <div class="row p-0 m-0">
                    <div class="col-md-12 text-center d-flex justify-content-around p-3 bg-light">
                    <a href="{{ route('totalForCountry') }}" class="font-weight-bolder zoom text-dark ">Total Cases</a>

                        <a href="{{ route('lastDayCountry') }}" class="font-weight-bolder zoom text-dark ">Last day</a>
                        <a href="{{ route('lastMonthCountry') }}" class="font-weight-bolder zoom text-dark">Last Month</a>
                        <a href="{{ route('lastThreeMonthsCountry') }}" class="font-weight-bolder zoom text-dark">Last Three Months</a>
                        <a href="{{ route('total') }}" class="font-weight-bolder zoom text-dark">Back to Home</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row my-0 mt-3">
            <div class="col-md-10 offset-1">
                <table id="countries" class="border border-dark w-100">
                    <tr class="border border-dark p-2">
                        <th class="border border-dark p-2">Country</th>
                        <th class="border border-dark p-2">Active</th>
                        <th class="border border-dark p-2">Deaths</th>
                        <th class="border border-dark p-2">Recovered</th>
                        <th class="border border-dark p-2">Confirmed</th>

                    </tr>

            </div>
            @yield('content')
            @yield('table')
            


            </table>
        </div>
    </div>
    </div>
    @stack('scripts')
    
</body>

</html>