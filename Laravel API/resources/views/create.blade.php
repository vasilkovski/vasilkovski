@extends('layouts.app')




@section('content')

<div class="container">
    <h5 class="mr-auto"><a href="/"> << Back </a></h5>
    <div class="row text-center">
        <div class="col-md-4 offset-4">
            <h2 class="text-center">Create vehicle</h2> 
            <form id="create">
                <label class="mt-2" for="brand">Brand : </label>
                <br><input class="w-100" id="brand" name="brand" type="text" ><br>
                <label class="mt-2" for="model">Model : </label>
                <br><input class="w-100" id="model" type="text" name="model" ><br>
                <label class="mt-2" for="plate">Plate number : </label>
                <br><input class="w-100" id="plate" type="text" name="plate_number" ><br>
                <label class="mt-2" for="insurance">Insurance date : </label><br>
                <input id="insurance" class="w-100" type="date" name="insurance_date" ><br>
                <button id="btn" type="submit" class="btn btn-primary my-2">Create</button>
            </form>

        </div>
    </div>
</div>

@endsection


@push('script')
<script>
    
   
    $('#create').submit(function(event) {  
        event.preventDefault();
        
       $.ajax({
            type: 'POST',
            url: `/api/vehicle/` ,
            data: $(this).serialize(),
            success: function(data) {
                window.location = '/vehicle/' + data.vehicle.id
            }
            
        })
       

    })
</script>

@endpush