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
        <div class="container body-content">


            <div class="jumbotron" style="text-align:center; background-image:url(../../images/unlandmarks.jpg);background-size: 300px 350px;background-repeat: no-repeat;">
                <h1>Welcomes you</h1>
                <p> Utilities </p>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Unlandmark Maintenance</h2>
                    <p>
                        Maintaining Unlandmark information 
                    </p>

                    <p>
                        <a class="btn btn-default disabled" href="Maintenance.php">Data Maintenance &raquo;</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <h2>Location Maintenance</h2>
                    <p>
                        Add new locations types to the database
                    </p>

                    <p>
                        <a class="btn btn-default" href="LocationTypeView.php">Location Maintenance &raquo;</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <h2>Unlandmark Verification</h2>
                    <p>
                        Verification of Unlandmark information (restricted access)
                    </p>

                    <p>
                        <a class="btn btn-default disabled" href="Verification.php">Verification &raquo;</a>
                    </p>
                </div>
            </div>


            <hr />
            <?php include "../includes/footer.php"; ?>
        </div>

    </body>
</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>