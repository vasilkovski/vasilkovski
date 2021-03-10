@extends('layouts.app')



@section('content')
<div class="container text-center">
    <h2>Vehicle</h2>
   
    <div class="row text-center m-auto">
    <h5 class="mr-auto"><a href="/"> << Back </a></h5>
        <div id="vehicle-show" class="col-md-12  ">

        </div>
    </div>
</div>

@endsection


@push('script')
<script>
    let vehicleId = window.location.pathname.match(/\d+/)[0]

    jQuery.get('/api/vehicle/' + vehicleId, function(data) {
        let vehicle = data.vehicle

        $('#vehicle-show').append(`
            <div class="card d-inline">
            <div class="card-header">
            Brand: <span class="font-weight-bolder">${vehicle.brand}</span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Model: <span class="font-weight-bolder"> ${vehicle.model}</span></li>
                <li class="list-group-item">Plate number:  <span class="font-weight-bolder">${vehicle.plate_number}</span></li>
                <li class="list-group-item"> Insurance date:  <span class="font-weight-bolder">${vehicle.insurance_date}</span></li>
            </ul>
            </div>
            `)
    })
</script>
@endpush