<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Stories
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="../../js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>

        <link href="../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../css/Site.css" rel="stylesheet"/>
        <link href="../../css/unlandmark.css" rel="stylesheet"/>
        <link href="../../images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <script>
            //selected function
            //Set places_id 
            //call get places detail lookup
            //call unlandmark_place_detail.php

            function mySelected()
            {
                //alert("MySelected()");
                //document.getElementById("landmark_places_list").selectedIndex = "0";
                var id = document.getElementById("landmark_places_list").value;
                //var name = document.getElementById("name").value;
                //var x = " ID= " + id;
                //alert("MySelected " + id);

                //document.getElementById("landmark_name").innerHTML = "You selected: " + id;
                showDetails(id);
            }
            function showDetails(id)
            {
                xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {

                        document.getElementById("landmark_name").innerHTML = xmlhttp.responseText;
                    }
                };
                obj = {places_id: id};
                var str_json = JSON.stringify(obj);
                openme = "../Controller/unlandmark_places_name.php?name=" + str_json;
                //alert(openme);
                xmlhttp.open("GET", openme);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <?php include "../includes/CommonHeadings.php"; ?>

        <div class="container body-content">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Stories</h2>
                    <p>
                        Pittsburghers like to tell their stores. Now is your chance to add information: Select a unlandmark name to begin.
                    </p>
                    <?php
                    include("../Controller/unlandmark_places_list.php");
                    ?>
                    <script>;
                        document.getElementById("landmark_places_list").selectedIndex = "0";
                        var id = document.getElementById("landmark_places_list").value;
                        showDetails(id);
                    </script>;
                </div>
                <div class="col-sm-8">
                    <h2>Add more detail</h2>
                    <table id="stories">
                        <tr>
                            <td class="label">Landmark Name</td>
                            <td class="wideField" id="landmark_name"></td>
                        </tr>

                        <td class="label">Research_notes</td>
                        <td class="wideField" ><input class="field" id="Research_notes"></td>
                        </tr>
                        <tr>
                            <td class="label">Research_sources</td>

                            <td class="wideField" ><input class="field" id="Research_sources"></td>
                        </tr>
                        <tr>
                            <td class="label">Personal_history_text</td>
                            <td class="wideField"><input class="field" id="Personal_history_text"></td>
                        </tr>
                        <tr>
                            <td class="label">Personal_history_subject</td>
                            <td class="wideField" ><input class="field" id="Personal_history_subject" ></td>
                        </tr>
                        <tr>
                            <td class="label">Personal_history_recorder</td>
                            <td class="wideField" ><input class="field" id="Personal_history_recorder" ></td>
                        </tr>
                        <tr>
                            <td class="label">Followup_email</td> 
                            <td class="wideField" ><input class="field" id="Followup_email" ></td>
                        </tr>
                    </table>

                </div>
            </div>
            <hr />
            <?php include "../includes/footer.php"; ?>

    </body>
</html>
