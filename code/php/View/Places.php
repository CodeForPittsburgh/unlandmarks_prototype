<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - Places
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="../../js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>

        <link href="../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../css/Site.css" rel="stylesheet"/>
        <link href="../../images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        <style>
            #map {
                height: 500px;
                width: 550px;
                float: right;
            }
            #controls {
                position: relative;
                width: 480px;
            }
            #autocomplete {
                position: relative;
                top: 0px;
                left: 0px;
                width: 550px;
                height: 20px;
            }
            .label {
                text-align: right;
                font-weight: bold;
                width: 100px;
                color: #303030;
            }
            #address {
                border: 1px solid #000090;
                background-color: #f0f0ff;
                width: 480px;
                padding-right: 2px;
            }
            #address td {
                font-size: 10pt;
            }
            .field {
                width: 99%;
            }
            .slimField {
                width: 80px;
            }
            .wideField {
                width: 200px;
            }
            .locationField {
                position: fixed;
                width: 480px;
                height: 20px;
                margin-bottom: 2px;
            }
        </style>
    </head>
<?php include "../includes/CommonHeadings.php"; ?>
    <!--
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="./" class="navbar-brand">UNLANDMARK</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./">Home</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="Contacts.php">Contact</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php">Register</a></li>
                    <li><a href="Login.php">Log in</a></li>
                </ul>

            </div>
        </div>
    </div>
    -->
    <div class="container">

        <h2>Places</h2>
        <h3>UNLANDMARK Place Entry Page.</h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-sm-6">
                <div id="locationField">
                    <input id="autocomplete" placeholder="Enter your address"
                           onFocus="geolocate()" type="text">
                </div>

                <table id="address">
                    <tr>
                        <td class="label">Street address</td>
                        <td class="slimField"><input class="field" id="street_number"
                                                     disabled></td>
                        <td class="wideField" colspan="2"><input class="field" id="route"
                                                                 disabled></td>
                    </tr>
                    <tr>
                        <td class="label">City</td>
                        <!-- Note: Selection of address components in this example is typical.
                             You may need to adjust it for the locations relevant to your app. See
                             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
                        -->
                        <td class="wideField" colspan="3"><input class="field" id="locality"
                                                                 disabled></td>
                    </tr>
                    <tr>
                        <td class="label">State</td>
                        <td class="slimField"><input class="field"
                                                     id="administrative_area_level_1" disabled></td>
                        <td class="label">Zip code</td>
                        <td class="wideField"><input class="field" id="postal_code"
                                                     disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Country</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="country" disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Latitude</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="latitude" disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Longitude</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="longitude" disabled></td>
                    </tr>
                                        <tr>
                        <td class="label">Landmark Name</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="landmark_name" ></td>
                    </tr>
                                        <tr>
                        <td class="label">Nickname</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="nickname" ></td>
                    </tr>
                </table>

            </div>



            <div class="col-sm-6" style="background-color:whitesmoke">
                <div id="map">
                    <p style="text-align: center">The map will display here!</p>
                </div>

            </div>
            <button id="Next" onClick="msgme()" type="button" disabled >Next &raquo;</button>

        </div>

        <hr />
        <?php include "../includes/footer.php"; ?>
    </div>
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name',
            latitude: 'long_name',
            longitude: 'long_name',
            landmark_name: 'long_name',
            nickname: 'long_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);

        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];

                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
            initMap();
            document.getElementById("Next").disabled = false;
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });

            }
        }
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(40.435467, -79.996404),
                zoom: 12,
                mapTypeId: 'roadmap'
            });
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow;
            geocodeAddress(geocoder, map, infowindow);
        }

        function geocodeAddress(geocoder, resultsMap, infowindow) {
            var address = document.getElementById('autocomplete').value;
            var lat;
            var lng;
            var infoWindow = new google.maps.InfoWindow;
            //alert(address);
            geocoder.geocode({'address': address}, function (results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                    lat = results[0].geometry.location.lat();
                    document.getElementById("latitude").value = lat;
                    lng = results[0].geometry.location.lng();
                    document.getElementById("longitude").value = lng;
                    var html = "<b>" + results[0].formatted_address + "</b>";
                    infowindow.setContent(html);
                    infowindow.open(resultsMap, marker);
                    bindInfoWindow(marker, resultsMap, infoWindow, html);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
            function bindInfoWindow(marker, map, infoWindow, html) {

                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                    //infoWindow.open(marker.get('map'), marker);

                });

                marker.addListener('mousedown', function () {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
            }
        }
        function msgme() {
//            var address = document.getElementById('autocomplete').value;
//            var lat = document.getElementById('latitude').value;
//            var lng = document.getElementById('longitude').value;
            var landmark_name = document.getElementById('landmark_name').value;
            var nickname =  document.getElementById('nickname').value;
            var address = document.getElementById('autocomplete').value;
            var lat = document.getElementById('latitude').value;
            var lng = document.getElementById('longitude').value;
            //alert(address + ",\n " + lat + ", " + lng);
            var url = "./PlacesStatus.php?landmark_name='"+landmark_name + "'&nickname='"+nickname + "'&address='" + address + "'&lat=" + lat + "&lng=" + lng;
            alert(url);
            window.location.assign(url);
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&libraries=places&callback=initAutocomplete"
    async defer></script>

</html>
