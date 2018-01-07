<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - messages
        </title>
        <script src="../../js/modernizr-2.6.2.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/respond.js" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

        <link href="../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../css/Site.css" rel="stylesheet"/>
        <link href="../../images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        
    </head>
    <?php include "../includes/CommonHeadings.php"; ?>

    <div class="container" >

        <h2>Messages</h2>
        <h3>UNLANDMARK Message Page.</h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <div class="row" >
            <div class="col-sm-4" style="background-color:whitesmoke; height: 500px">
                <div id="message">
                </div>

                <?php
                $message = 'message';


                $my_message = filter_input(INPUT_GET, $message);
                echo '<p id="message" >' . $my_message . '</p>';

                function phpAlert($msg) {
                    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                }
                ?>

            </div>

        </div>

        <hr />
        <?php include "../includes/footer.php"; ?>

    </div>


</html>


