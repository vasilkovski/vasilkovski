@extends('table')


@section('content')

@if($all[3] == 0)
 <h1 class="bg-warning">No result found</h1>
@else
<div class="row">
<div class="col-md-12">

    <h2 class="text-center">Total cases</h2>
@foreach($newCovid as $info)
               
               <tr class="border border-dark p-2">
                   <td class="border border-dark p-2"> {{ $info->countries->name}}</td>
                   <td class="border border-dark p-2">{{ $info->active}}</td>
                   <td class="border border-dark p-2">{{ $info->deaths }}</td>
                   <td class="border border-dark p-2">{{ $info->recovered }}</td>
                   <td class="border border-dark p-2">{{ $info->confirmed }}</td>
               </tr>
               @endforeach
 </div></div>
@endsection
@section('table')

<div class="container">
    <canvas id="chart" class="h-50"></canvas>
</div>
@endif
@endsection



@push('scripts')

<script>
        let chart = document.getElementById('chart').getContext('2d')
        let dataPerDay = <?= json_encode($all) ?>;
        let casesChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ['Active', 'Deaths', 'Recovered','Confirmed'],
                datasets: [{
                    label: 'Cases',
                    data: dataPerDay,
                    backgroundColor: [
                        'blue',
                        'red',
                        'green',
                        'black'
                    ]
                }]
            },
            options: {}

        })
    </script>
    @endpush