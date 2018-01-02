<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Unlandmark Places Maintenance
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="../../js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>

        <link href="../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../css/Site.css" rel="stylesheet"/>
        <link href="../../images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <style>
            table, th, td {
                border: 1px solid black;
                column-width: 400px;
            }
        </style>
        <script>
            //selected function
            //Set places_id 
            //call get places detail lookup
            //call unlandmark_place_detail.php

            function mySelected()
            {
                //alert("MySelected()");
                var id = document.getElementById("landmark_places_list").value;
                //var name = document.getElementById("name").value;
                var x = " ID= " + id;
                //alert("MySelected " + x);
                document.getElementById("landmark_stuff").innerHTML = "You selected: " + x;
                showDetails(id);
            }

            function showDetails(id)
            {
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {

                        document.getElementById("landmark_place_detail").innerHTML = xmlhttp.responseText;
                    }
                };
                obj = {places_id: id};
                var str_json = JSON.stringify(obj);
                openme = "../Controller/unlandmark_place_detail.php?name=" + str_json;
                //alert(openme);
                xmlhttp.open("GET", openme);
                xmlhttp.send();
            }
        </script>

    </head>

    <body>
        <?php include "../includes/CommonHeadings.php"; ?>
        <!--        <div class="container body-content">
        
        
                    <div class="jumbotron" style="text-align:center; background-image:url(../../images/unlandmarks.jpg);background-size: 300px 350px;background-repeat: no-repeat;">
                        <h1>Welcomes you</h1>
                        <p> Places Utilities </p>
                    </div>-->

        <div class="row">
            <div class="col-sm-4" id="landmark_places_lists">
                <?php include "../Controller/unlandmark_places_list.php"; ?>
                <script>;
                    document.getElementById("landmark_places_list").selectedIndex = "0";
                    var id = document.getElementById("landmark_places_list").value;
                    showDetails(id);
                </script>;
            </div>
            <div class="col-sm-4" id="landmark_place_detail" style="background-color: cyan" >
                <p>Address stuff goes here</p>
                <script>
                    //var id = 53;
                    //myload(id);
                    showDetails('');
                    //displayAddress(id);
                </script>   

            </div>
            <div class="col-sm-4" id="landmark_stuff" style="background-color: lawngreen">
                <p>ID stuff goes here</p>
            </div>
        </div>
        <hr />
        <?php include "../includes/footer.php"; ?>



    </body>

</html>

