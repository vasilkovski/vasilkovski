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
         .zoom{ 
             font-size: 1.5em;
            -webkit-text-stroke-width: 0.5px;
    -webkit-text-stroke-color: black;
        } 
        .zoom:hover {
            transform: scale(1.2);
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light border-dark border-bottom">
        <div class="row mx-0 my-0 mt-3 p-0 bg-light w-100">
            <div class="col-md-12 text-center  ">
                <div class="sticky-top bg-light">
                    <a href="{{ route('total')}}">
                        <h1 class="text-secondary">Coronavirus Cases:</h1>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row p-3  mx-0 border-dark border-bottom bg-light">
        <div class="col-md-8 offset-2 text-center d-flex justify-content-around">
            <a href="{{ route('lastDay') }}" class="zoom ">Last day</a>
            <a href="{{ route('lastMonth') }}" class="zoom ">Last Month</a>
            <a href="{{ route('lastThreeMonths') }}" class="zoom ">Last Three Months</a>
            <a href="#countries" class="zoom "> View by countries </a>
            <a href="{{ route('sync') }}"> <button class="btn btn-primary ">Sync cases</button></a>
        </div>

    </div>
    <div class="row p-0 mx-0 my-3">
        <div class="col-md-6 offset-md-3 text-center">



            <div class="border-dark border">

                <div>
                    @if (\Route::current()->getName() == 'total')
                    <h1 class="text-white bg-secondary p-2">Total global cases</h1>
                    @elseif (\Route::current()->getName() == 'lastMonth')
                    <h1 class="text-white bg-secondary p-2">Last 30 days</h1>
                    @elseif(\Route::current()->getName() == 'lastThreeMonths')
                    <h1 class="text-white bg-secondary p-2">Last 90 days</h1>
                    @elseif(\Route::current()->getName() == 'lastDay')
                    <h1 class="text-white bg-secondary p-2">Last day</h1>
                    @endif
                </div>


                <div class="p-2 border-bottom border-dark">
                    <h1>Corona virus cases</h1>
                    @if (\Route::current()->getName() == 'total')
                    <h1 class="text-dark">{{ $per_total[2]}}</h1>
                    @elseif (\Route::current()->getName() == 'lastMonth')
                    <h1 class="text-dark">{{ $total_per_month[2]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastThreeMonths')
                    <h1 class="text-dark">{{ $total_per_threeMonths[2]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastDay')
                    <h1 class="text-dark">{{ $total_per_day[2]}}</h1>
                    @endif
                </div>



                <div class="p-2 border-bottom border-dark">
                    <h1>Death cases</h1>
                    @if (\Route::current()->getName() == 'total')
                    <h1 class="text-danger">{{ $per_total[0]}}</h1>
                    @elseif (\Route::current()->getName() == 'lastMonth')
                    <h1 class="text-danger">{{ $total_per_month[0]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastThreeMonths')
                    <h1 class="text-danger">{{ $total_per_threeMonths[0]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastDay')
                    <h1 class="text-danger">{{ $total_per_day[0]}}</h1>
                    @endif
                </div>


                <div class="p-2 border-bottom border-dark">
                    <h1>Recovered cases</h1>
                    @if (\Route::current()->getName() == 'total')
                    <h1 class="text-success">{{ $per_total[1]}}</h1>
                    @elseif (\Route::current()->getName() == 'lastMonth')
                    <h1 class="text-success">{{ $total_per_month[1]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastThreeMonths')
                    <h1 class="text-success">{{ $total_per_threeMonths[1]}}</h1>
                    @elseif(\Route::current()->getName() == 'lastDay')
                    <h1 class="text-success">{{ $total_per_day[1]}}</h1>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row p-3  mx-0 border-dark border-bottom">
            <div class="col-md-8 offset-2 text-center d-flex justify-content-around">
                <a href="" class="zoom" id="total">Total</a>
                <a href="" class="zoom" id="lastDay">Last day</a>
                <a href="" class="zoom" id="lastMonth">Last Month</a>
                <a href=" " class="zoom" id="last3months">Last Three Months</a>


            </div>

        </div>
        <canvas id="chart"></canvas>
    </div>


    <div class="row mx-0 p-5 mt-5 border-top border-dark bg-secondary">
        <div class="col-md-8 offset-2 mt-5">
            <div class="byCountries d-flex justify-content-around">
                <h2 class="text-white">View by countries:</h2>
                <form action="{{ route('country') }}" method="POST" id="countries" class="mt-1">
                    @csrf
                    <select name="country" id="">
                        <option value="">-- Select country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id}}">{{ $country->name}} </option>
                        @endforeach
                    </select>
                    <button type="submit"> Search</button>

                </form>
            </div>


        </div>
    </div>

    <footer class="w-100 bg-dark text-white text-center p-4"> Created with <span class=text-danger>&#10084</span> by <a href="{{ route('total') }}" class="text-white">Nikola</a> </footer>
    <script>
        document.getElementById("lastMonth").addEventListener("click", function(event) {
            event.preventDefault()
            let chart = document.getElementById('chart').getContext('2d')
        let data = <?= json_encode($total_per_month) ?>;
        let casesChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: [ 'Deaths', 'Recovered','Confirmed'],
                datasets: [{
                    label: 'Cases',
                    data: data,
                    backgroundColor: [
                        'red',
                        'green',
                        'black'
                    ]
                }]
            },
            options: {
                title:{
                   display: true,
                   text: 'Total last month covid cases',
                   fontSize: 25
                },
                tooltips:{
                    display:false
                }
            }

        })
        });
        document.getElementById("last3months").addEventListener("click", function(event) {
            event.preventDefault()
            let chart = document.getElementById('chart').getContext('2d')
        let data = <?= json_encode($total_per_threeMonths) ?>;
        let casesChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ['Deaths', 'Recovered','Confirmed'],
                datasets: [{
                    label: 'Cases',
                    data: data,
                    backgroundColor: [
                        'red',
                        'green',
                        'black'
                    ]
                }]
            },
            options: {
                title:{
                   display: true,
                   text: 'Total last 90 days covid cases',
                   fontSize: 25
                },
                tooltips:{
                    display:false
                }
            }

        })
        });
        document.getElementById("lastDay").addEventListener("click", function(event) {
            event.preventDefault()
            let chart = document.getElementById('chart').getContext('2d')
        let data = <?= json_encode($total_per_day) ?>;
        let casesChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ['Deaths', 'Recovered','Confirmed'],
                datasets: [{
                    label: 'Cases',
                    data: data,
                    backgroundColor: [
                        'red',
                        'green',
                        'black'
                    ]
                }]
            },
            options: {
                title:{
                   display: true,
                   text: 'Total last day covid cases',
                   fontSize: 25
                },
                tooltips:{
                    display:false
                }
            }

        })
        });
   
       
    </script>

<script>
    let chart = document.getElementById('chart').getContext('2d')
        let data = <?= json_encode($per_total) ?>;
        let casesChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ['Deaths', 'Recovered','Confirmed' ],
                datasets: [{
                    label: 'Cases',
                    data: data,
                    backgroundColor: [
                        'red',
                        'green',
                        'black'
                    ]
                }]
            },
            options: {
                title:{
                   display: true,
                   text: 'Total global covid cases',
                   fontSize: 25
                },
                tooltips:{
                    display:false
                }
            }

        })
</script>
</body>

</html>