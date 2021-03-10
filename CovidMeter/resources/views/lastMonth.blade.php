@extends('table')



@section('content')
@if($lastMonthCases[3] == 0)
    <h1 class="bg-warning">No result found for last 30 days</h1>
@else
<div class="row"><div class="col-md-12">

    <h2 class="text-center">Last 30 days</h2>
@foreach($newCovid as $info)
               
               <tr class="border border-dark p-2">
                   <td class="border border-dark p-2"> {{ $info->countries->name}}</td>
                   @if($lastMonthCases[0] > 0)
                   <td class="border border-dark p-2">{{ $lastMonthCases[0]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastMonthCases[1] > 0)
                   <td class="border border-dark p-2">{{ $lastMonthCases[1]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastMonthCases[2] > 0)
                   <td class="border border-dark p-2">{{ $lastMonthCases[2]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastMonthCases[3] > 0)
                   <td class="border border-dark p-2">{{ $lastMonthCases[3]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif

              
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
    let dataMonth = <?= json_encode($lastMonthCases) ?>;
    if(dataMonth[0] < 0 ){
        dataMonth[0] = 0
    }
    if(dataMonth[1] < 0 ){
        dataMonth[0] = 0
    }
    if(dataMonth[2] < 0 ){
        dataMonth[0] = 0
    }
    if(dataMonth[3] < 0 ){
        dataMonth[0] = 0
    }
    let casesChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: ['Active', 'Deaths', 'Recovered','Confirmed'],
            datasets: [{
                label: 'Cases',
                data: [dataMonth[0], dataMonth[1], dataMonth[2], dataMonth[3]],
                backgroundColor: [
                    'blue',
                    'red',
                    'green',
                    'black'
                ]
            }],
            ticks: {
                min:1,
            }
        },
        options: {}

    })
</script>
@endpush