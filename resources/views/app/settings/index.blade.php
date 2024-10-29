@extends('app.layout')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-md-6">
            <h4 class="title"><i class="fa-solid fa-gears"></i> Settings</h4>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>

<h5>Branch: {{$branch->name}}</h5>
<br>
<div class="row">
    <div class="col-md-2">
        <form action="">
            <div class="form-group">
                <label for="">Set VAT (%)</label>
                <input type="number" step="any" value="{{$branch->vat}}" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm btn-block">SET</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <h6>Branch Exact Location</h6>
        <div>
            Status:
            @if($branch->isLocationNotSet()) 
                <span class="text-danger">Not Set <i class="fa-regular fa-circle-xmark"></i></span> 
            @else 
                <span class="text-success">Set <i class="fa-solid fa-check"></i> </span> 
            @endif 
        </div>
        <div>
            Please make sure you're at the exact location of this branch.
        </div>
        <div class="row" style="margin-top:6px">
            <div class="col-md-6">
                <div class="form-group">
                    <button id="location_btn" onclick="getUserLocation()" class="btn btn-primary btn-sm btn-block">Set Branch location</button>
                </div> 
            </div>
            @if(!$branch->isLocationNotSet()) 
                @php 
                    $location = $branch->getCoordinates(); 
                    $latitude = $location['latitude']; 
                    $longitude = $location['longitude']; 
                @endphp 
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="https://www.google.com/maps/{{'@'.$latitude}},{{$longitude}},15z" target="_blank" class="btn btn-primary btn-sm btn-block">View on map</a>
                    </div> 
                </div> 
            @endif 
        </div>
    </div>
</div>

<form action="">

</form>




<script>
function getUserLocation() {
  // Check if geolocation is available in the browser
  let btn = $("#location_btn"); 
  let btn_content = btn.text(); 

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      // Success callback
      (position) => {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;


        console.log("Latitude:", latitude);
        console.log("Longitude:", longitude);

        $.ajax({
            type: 'POST',
            url: '{{route('admin.set_branch_location', $branch->id)}}', // Replace with your server endpoint
            data: {
                'longitude':longitude,
                'latitude':latitude
            },
            success: function (res) {
                unLoadButton(btn, btn_content)
                if(res.success){
                    Swal.fire(
                        'Location data has been set',
                        '',
                        'success'
                    )
                    // window.location.reload(); 
                }else{
                    Swal.fire(
                        'No location data was set',
                        '',
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                unLoadButton(btn, btn_content);
                if (xhr.status === 0) {
                    Swal.fire(
                        'Network error: Please check your internet connection.',
                        '',
                        'error'
                    )
                } else {
                    Swal.fire(
                        'Something went wrong please try again',
                        '',
                        'error'
                    )
                }
            }
        });
      },
      // Error callback
      (error) => {
            switch (error.code) {
            case error.PERMISSION_DENIED:
                Swal.fire(
                    'You denied the request',
                    '',
                    'error'
                )
                break;
            case error.POSITION_UNAVAILABLE:
                Swal.fire(
                    'Location information is unavailable.',
                    '',
                    'error'
                )
                break;
            case error.TIMEOUT:
                Swal.fire(
                    'The request to get user location timed out.',
                    '',
                    'error'
                )
                break;
            case error.UNKNOWN_ERROR:
                Swal.fire(
                    'An unknown error occurred.',
                    '',
                    'error'
                )
                break;
            }
        },
        { 
            enableHighAccuracy: true, 
            timeout: 10000,
            maximumAge: 0 
        }
    );
  } else {
    Swal.fire(
        'Geolocation is not supported by this browser.',
        '',
        'error'
    )
  }
}

// Trigger the function
getUserLocation();

</script>
@stop 