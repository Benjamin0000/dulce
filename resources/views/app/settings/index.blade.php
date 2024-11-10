@extends('app.layout')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-md-6">
            <h4 class="title"><i class="fa-solid fa-gears"></i> Settings</h4>
        </div>
        <div class="col-md-6">
            <h4><i class="fa-solid fa-home"></i> {{$branch->name}}</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h5>Charge Settings</h5>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form id="set_vat_form" onsubmit="event.preventDefault(); submit_vat()">
                    <div class="form-group">
                        <label for="">Set VAT (%)</label>
                        <input type="number" name="vat" step="any" value="{{$branch->vat}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm btn-block">SET</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form id="set_service_fee_form" onsubmit="event.preventDefault(); submit_service_fee()">
                    <div class="form-group">
                        <label for="">Service Charge (₦)</label>
                        <input type="number" name="service_fee" step="any" value="{{$branch->service_fee}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm btn-block">SET</button>
                    </div>
                </form>
            </div>
        </div>       
        <br>
        <div class="row">
            <div class="col-6">
                <h6>Discounts</h6>
            </div>
            <div class="col-6 text-end">
                <button style="margin-top: -10px" onclick="toggle_discount_con()" class="badge bg-primary">Create Discount &nbsp;<i style="margin-top: 2px" class="fa-solid fa-caret-down"></i> </button>
            </div>
        </div> 
        <div id="discount_form_con" style="display: none">
            
            <form id="create_discount_form" onsubmit="event.preventDefault(); create_discount()">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" required class="form-control" name="code" placeholder="CODE">
                    </div>
                    <div class="col-md-3">
                        <input type="text" required class="form-control" name="min_purchase" placeholder="Min purchase">
                    </div>
                    <div class="col-md-2">
                        <input type="text" style="padding: 5px" required class="form-control" name="pct" placeholder="%">
                    </div>
                    <div class="col-md-2">
                        <input type="text" style="padding: 5px" required class="form-control" name="days" placeholder="Days">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block">Create</button>
                    </div>
                </div>
            </form>
            
        </div>
        <div class="table-responsive" id="discount_table_con">
            @include('app.settings.includes.discount_table')
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <h5>Delivery Settings</h5>
        <br>
        <h6>Set Branch Exact Location</h6>
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
        <br>

        <form id="set_delivery_cost_form" onsubmit="event.preventDefault(); set_delivery_data()">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">MAX kilometres</label>
                        <input type="number" name="max_km" required step="any" value="{{$branch->max_km}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Cost Per kilometre (₦)</label>
                        <input type="number" name="cost" required step="any" value="{{$branch->cost_per_km}}" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="form-group" style="margin-top:12px">
                <button class="btn btn-primary btn-sm btn-block">SET Delivery info</button>
            </div>
        </form>
        <br>

        <br>
        <div class="row">
            <div class="col-6">
                <h6>Delivery Locations</h6>
            </div>
            <div class="col-6 text-end">
                <button onclick="toggle_location_form_con()" style="margin-top: -10px" class="badge bg-primary">Create Location &nbsp;<i style="margin-top: 2px" class="fa-solid fa-caret-down"></i> </button>
            </div>
        </div> 
        <div id="add_location_form_con" style="display: none">
            <form onsubmit="event.preventDefault(); create_location()"  action="" id="add_location_form">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="region" required class="form-control" placeholder="Enter Region">
                    </div>
                    <div class="col-md-3">
                        <input type="number" step="any" required name="cost" class="form-control" placeholder="Cost">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-sm btn-block">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="location_table_con">
           @include('app.settings.includes.location_table')
        </div>
    </div>
</div>

<script>

function toggle_discount_con(){
    $('#discount_form_con').slideToggle();
}

function toggle_location_form_con(){
    $('#add_location_form_con').slideToggle();
}

function set_delivery_data(){
    submit_forms("#set_delivery_cost_form", '{{route('admin.create_delivery_cost', $branch->id)}}', false)
}

function create_location(){
    submit_forms("#add_location_form", '{{route('admin.create_location', $branch->id)}}', true)
}

function create_discount(){
    submit_forms("#create_discount_form", '{{route('admin.create_discount', $branch->id)}}', true)
}
function submit_vat(){
    submit_forms("#set_vat_form", '{{route('admin.set_vat', $branch->id)}}', false)
}

function submit_service_fee(){
    submit_forms("#set_service_fee_form", '{{route('admin.set_service_fee', $branch->id)}}', false)
}


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
                    window.location.reload(); 
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
            timeout: 10000, // Maximum time to wait for a response
            maximumAge: 0 //
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


function submit_forms(_form, url_, reload=true )
{
    let form = $(_form); 
    let btn = form.find('button'); 
    let btn_content = btn.text(); 
    loadButton(btn)
    $.ajax({
        type: 'POST',
        url: url_, // Replace with your server endpoint
        data: form.serialize(),
        success: function (res) {
            unLoadButton(btn, btn_content)
            if(res.success){
                Swal.fire(
                    res.success,
                    '',
                    'success'
                ) 
                if(reload)
                    window.location.reload(); 
            }else{
                Swal.fire(
                    res.error,
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
}


function load_more(paginator_con, table_con, url_)
{
    $(document).on('click', paginator_con+' a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        // Extract the 'page' parameter from the URL
        let page = new URL(url).searchParams.get("page");
        $.ajax({
            type: 'get',
            url: url_+'?page='+page, // Replace with your server endpoint
            success: function (res) {
                $(table_con).html(res.view)
            },
            error: function (xhr, status, error) {
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
        })
    });
}

window.onload = ()=>{
    load_more('#discount_paginator', '#discount_table_con', '{{route('admin.load_more_discounts', $branch->id)}}')
    load_more('#location_paginator', '#location_table_con', '{{route('admin.load_more_location', $branch->id)}}')
}
</script>
@stop 