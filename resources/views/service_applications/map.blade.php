@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">Service Application Map</h4>
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="clearfix"></div>

        <div class="card">
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var coordinate1 = {
                latitude: {{ $serviceApplication->latitude1 }},
                longitude: {{ $serviceApplication->longitude1 }}
            };

            var coordinate2 = {
                latitude: {{ $serviceApplication->latitude2 }},
                longitude: {{ $serviceApplication->longitude2 }}
            };

            // Calculate the center of the map based on the two coordinates
            var centerLatitude = (coordinate1.latitude + coordinate2.latitude) / 2;
            var centerLongitude = (coordinate1.longitude + coordinate2.longitude) / 2;

            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: parseFloat(centerLatitude), lng: parseFloat(centerLongitude) },
                zoom: 8
            });

            // Add markers for each coordinate
            var marker1 = new google.maps.Marker({
                position: { lat: parseFloat(coordinate1.latitude), lng: parseFloat(coordinate1.longitude) },
                map: map,
                title: 'Coordinate 1'
            });

            var marker2 = new google.maps.Marker({
                position: { lat: parseFloat(coordinate2.latitude), lng: parseFloat(coordinate2.longitude) },
                map: map,
                title: 'Coordinate 2'
            });
        }
    </script>
@endsection
