@extends('layouts.app')




@section('content')
<div class="container">
    <a href="/"><h3 class="text-center">Vehicle</h3></a>

    <div class="row">
    <h5 class="mr-auto"><a href="vehicle/create"> <button class="btn btn-primary"> Create user </button></a></h5>
        <div class="col-md-10 offset-2">
            <table  class="border border-dark"> 
            <thead class="bg-dark text-white">
            <tr >
            <th class=" border border-light p-2">Brand</th>
            <th class=" border border-light p-2">Model</th>
            <th class=" border border-light p-2">Plate number</th>
            <th class=" border border-light p-2">Car insurance date</th>
            <th class=" border border-light p-2 text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="vehicles-holder">
            
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection




@push('script')
<script>



  jQuery.get('api/vehicle', function(data){
     data.vehicles.forEach(vehicle =>{
         $('#vehicles-holder').append(`
        <tr>
       <td class=" border border-dark p-2"> <a href="vehicle/${vehicle.id}">${vehicle.brand}</a> </td>
         <td class=" border border-dark p-2">${vehicle.model}</td>
         <td class=" border border-dark p-2">${vehicle.plate_number}</td>
         <td class=" border border-dark p-2">${vehicle.insurance_date}</td>
         <td class=" border border-dark p-2"><a href="vehicle/${vehicle.id}/edit"><button class="btn btn-warning">Edit</button></a></td>
        
         <td class=" border border-dark p-2"><button id="${vehicle.id}" class="btn btn-danger delete">Delete</button></td>
        
         </tr>
         `)
             })
  })

 

$(document).on('click', '.delete', function(event){
        event.preventDefault();
    $.ajax({
            type: 'DELETE',
            url: `/api/vehicle/` + event.target.id,
            success: function(data) {
                window.location = '/'
            }
            
        })
  })
  
</script>
@endpush