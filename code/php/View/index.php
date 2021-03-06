<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - UNLANDMARK
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="../../js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>

        <link href="../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../css/Site.css" rel="stylesheet"/>
        <link href="../../images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>

    <body>
        <?php include "../includes/CommonHeadings.php"; ?>

    <div class="row">
        <div class="col-sm-4">
            <h2>Getting started</h2>
            <p>
                Add the Unlandmark name and address information and run process to geo-code (get lat and lng)
            </p>

            <p>
                <a class="btn btn-default" href="Places.php">Places &raquo;</a>
            </p>
        </div>
        <div class="col-sm-4">
            <h2>Add more detail</h2>
            <p>
                You can add narratives, web links and personal accounts
            </p>
            <p>
                <a class="btn btn-default" href="Stories.php">Stories &raquo;</a>
            </p>
        </div>
        <div class="col-sm-4">
            <h2>Show on the map</h2>
            <p>
                Lets see what it looks like on the map.
            </p>
            <p>
                <a class="btn btn-default disabled" href="Map.php">Map it &raquo;</a>
            </p>
        </div>
    </div>


            <hr />
            <?php include "../includes/footer.php"; ?>


    </body>
</html>
