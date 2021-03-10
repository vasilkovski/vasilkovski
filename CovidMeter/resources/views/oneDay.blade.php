@extends('table')



@section('content')
@if($lastOneDayCases[3] == 0)
    <h1 class="bg-warning">No result found for last day</h1>
@else
<div class="row"><div class="col-md-12">

    <h2 class="text-center">Last day</h2>
@foreach($newCovid as $info)
               
               <tr class="border border-dark p-2">
                   <td class="border border-dark p-2"> {{ $info->countries->name}}</td>
                   @if($lastOneDayCases[0] > 0)
                   <td class="border border-dark p-2">{{ $lastOneDayCases[0]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastOneDayCases[1] > 0)
                   <td class="border border-dark p-2">{{ $lastOneDayCases[1]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastOneDayCases[2] > 0)
                   <td class="border border-dark p-2">{{ $lastOneDayCases[2]}}</td>
                   @else
                   <td class="border border-dark p-2">0</td>
                   @endif
                   @if($lastOneDayCases[3] > 0)
                   <td class="border border-dark p-2">{{ $lastOneDayCases[3]}}</td>
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
    let lastDay = <?= json_encode($lastOneDayCases) ?>;
    if(lastDay[0] < 0 ){
        lastDay[0] = 0
    }
    if(lastDay[1] < 0 ){
        lastDay[1] = 0
    }
    if(lastDay[2] < 0 ){
        lastDay[2] = 0
    }
    if(lastDay[3] < 0 ){
        lastDay[3] = 0
    }
    console.log(lastDay[0])
    let casesChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: ['Active', 'Deaths', 'Recovered','Confirmed'],
            datasets: [{
                label: 'Cases',
                data: [lastDay[0], lastDay[1], lastDay[2], lastDay[3]],
                backgroundColor: [
                    'blue',
                     'red',
                    'green',
                    'black'
                ]
            }]
        }

    })
</script>
@endpush