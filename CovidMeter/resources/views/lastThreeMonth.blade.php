@extends('table')



@section('content')
@if($last3MonthCases[3] == 0)
    <h1 class="bg-warning">No result found for last 90 days</h1>
@else
<div class="row">
    <div class="col-md-12">

        <h2 class="text-center">Last 90 days</h2>
        @foreach($newCovid as $info)

        <tr class="border border-dark p-2">
            <td class="border border-dark p-2"> {{ $info->countries->name}}</td>

                   @if($last3MonthCases[0] > 0)
                   <td class="border border-dark p-2">{{ $last3MonthCases[0]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($last3MonthCases[1] > 0)
                   <td class="border border-dark p-2">{{ $last3MonthCases[1]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($last3MonthCases[2] > 0)
                   <td class="border border-dark p-2">{{ $last3MonthCases[2]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($last3MonthCases[3] > 0)
                   <td class="border border-dark p-2">{{ $last3MonthCases[3]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif


        </tr>
        @endforeach
    </div>
</div>

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
    let data3Months = <?= json_encode($last3MonthCases) ?>;
    if(data3Months[0] < 0 ){
        data3Months[0] = 0
    }
    if(data3Months[1] < 0 ){
        data3Months[0] = 0
    }
    if(data3Months[2] < 0 ){
        data3Months[0] = 0
    }
    if(data3Months[3] < 0 ){
        data3Months[0] = 0
    }
    let casesChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: ['Active', 'Deaths', 'Recovered','Confirmed'],
            datasets: [{
                label: 'Cases',
                data: [data3Months[0], data3Months[1], data3Months[2], data3Months[3]],
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