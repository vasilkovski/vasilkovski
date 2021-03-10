@extends('layouts.app')




@section('content')

<div class="container">
    <h5 class="mr-auto"><a href="/"> << Back </a></h5>
    <div class="row text-center">
        <div class="col-md-4 offset-4">
            <h2 class="text-center">Update vehicle</h2> 
            <form id="update">
                <label class="mt-2" for="brand">Brand : </label>
                <br><input class="w-100" id="brand" name="brand" type="text" value=""><br>
                <label class="mt-2" for="model">Model : </label>
                <br><input class="w-100" id="model" type="text" name="model" value=""><br>
                <label class="mt-2" for="plate">Plate number : </label>
                <br><input class="w-100" id="plate" type="text" name="plate_number" value=""><br>
                <label class="mt-2" for="insurance">Insurance date : </label><br>
                <input id="insurance" class="w-100" type="date " name="insurance_date" value=""><br>
                <button id="btn" type="submit" class="btn btn-primary my-2">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection


@push('script')
<script>
    let vehicleId = window.location.pathname.match(/\d+/)[0]
    $.get('/api/vehicle/' + vehicleId, function(data) {
        $('#brand').val(data.vehicle.brand);
        $('#model').val(data.vehicle.model)
        $('#plate').val(data.vehicle.plate_number)
        $('#insurance').val(data.vehicle.insurance_date)

    })


   
    $('#update').submit(function(event) {  
        event.preventDefault();
        
       $.ajax({
            type: 'PUT',
            url: `/api/vehicle/` + vehicleId,
            data: $(this).serialize(),
            success: function(data) {
                window.location = '/vehicle/' + vehicleId
            }
            
        })
       

    })
</script>

@endpush