<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - Contacts
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
                <p> Contacts </p>
            </div>       
            <h2>Contact</h2>
            <h3>Your contact page.</h3>
            <address>
                Code For Pittsburgh<br />
                Pittsburgh PA<br />
                <abbr title="Phone">P:</abbr>
                412-555-5555
            </address>

            <address>
                <strong>Support: unlandmarks@gmail.com</strong><br />
            </address>

            <hr />
            <?php include "../includes/footer.php"; ?>
        </div>

    </body>
</html>
