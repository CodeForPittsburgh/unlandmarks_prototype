<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

need to pass in address,lat and lng
with the status information to be saved in the address table and the places table (linked to address)
-->


<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - Places Status
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

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
    <div class="container" >

        <h2>Places</h2>
        <h3>UNLANDMARK Place Status Entry Page.</h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <div class="row" >
            <div class="col-sm-4" style="background-color:whitesmoke; height: 500px">

                <!-- calendar css needed -->
                <?php
                include '../includes/PlacesAddressInformation.php';
                echo "  <form>";
                echo "<p>Date Unlandmark ended (mm/dd/yyyy)</p>";
                echo '<p>Date: <input type="text" id="datepicker"></p>';
                echo '  </form>';
                ?>

            </div>
            <div class="col-sm-4">

                <p>Unlandmark location type - pull down</p>
                <?php
                include '../includes/LandmarkTypeOriginal.php';
                ?>

            </div>
            <div class="col-sm-4">
                <p>Unlandmark current location type - pull down</p>
                <?php
                include '../includes/LandmarkTypeCurrent.php';
                ?>
                <p>Need code to handle when ready to save</p>
                <button id="Enable" type="button" onclick="enableButton()">Enable &raquo;</button>

                <button id="Save" type="button" disabled onclick="msgme()">Save &raquo;</button>
            </div>
            <div id="demo"></div>
        </div>

        <hr />
        <?php include "../includes/footer.php"; ?>

    </div>
    <script>

        var former_landmark_type;
        var current_landmark_type;
        var address;
        var lat;
        var lng;
        var original_description;
        var current_description;
        var enddate;
        var obj;
        var landmark_name;
        var nickname;

        function enableButton()
        {
            address = document.getElementById('autocomplete').value;
            lat = document.getElementById('latitude').value;
            lng = document.getElementById('longitude').value;
            var ef = document.getElementById('former_landmark_type');
            former_landmark_type = ef.options[ef.selectedIndex].text;
            var ec = document.getElementById('current_landmark_type');
            current_landmark_type = ec.options[ec.selectedIndex].text;
            original_description = document.getElementById('original_description').value;
            current_description = document.getElementById('current_description').value;
            enddate = document.getElementById('datepicker').value;
            landmark_name = document.getElementById('landmark_name').value;
            nickname = document.getElementById('nickname').value;
            
            var message = landmark_name + ",\n"+ nickname + ",\n"+ address + ",\n " + lat + ", " + lng + ",\n" + former_landmark_type + ",\n " + original_description + ",\n" + enddate + ",\n" + current_landmark_type + ",\n " + current_description;
            displayAlert(message);
            obj = {"landmark_name":landmark_name,"nickname":nickname,"address": address, "lat": lat, "lng": lng, "former_landmark_type": former_landmark_type, "original_description": original_description, "enddate": enddate, "current_landmark_type": current_landmark_type, "current_description": current_description};
            document.getElementById("Save").disabled = false;
        }
        function msgme() {

            var str_json = JSON.stringify(obj);
            alert(str_json);
            openme = "../Controller/DBUpdate.php?x=" + str_json;
            //openme = "createTable.php?mindate=" + startdate + "&maxdate=" + enddate + parmlist;
            alert(openme);
            window.open(openme, "_self");
        }
        function displayAlert(message)
        {
            alert(message);
        }
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
    <!--
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&libraries=places&callback=initAutocomplete"
    async defer></script>
    -->

</html>
