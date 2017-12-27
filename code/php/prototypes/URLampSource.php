<html>

    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Unlandmark URL Test
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


            function showDetails(id)
            {
                id = replaceamp(id);
                xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {

                        document.getElementById("URL_detail").innerHTML = xmlhttp.responseText;
                    }
                };
                obj = {places_id: id};
                var str_json = JSON.stringify(obj);
                openme = "../prototypes/URLampTarget.php?name=" + str_json;
                alert(openme);
                xmlhttp.open("GET", openme);
                xmlhttp.send();
            }
            function replaceamp(str)
            {
                var amp = '%26';
                var res = str.replace("&", amp);
                return res;
            }
        </script>

    </head>

    <body>
        <?php include "../includes/CommonHeadings.php"; ?>
        <div class="container body-content">


            <div class="jumbotron" style="text-align:center; background-image:url(../../images/unlandmarks.jpg);background-size: 300px 350px;background-repeat: no-repeat;">
                <h1>Welcomes you</h1>
                <p> URL Test </p>
            </div>

            <div class="row">

                <div class="col-sm-4" id="URL_detail" style="background-color: cyan" >
                    <p>URL stuff goes here</p>
                    <script>
                        var amp = '%26';
                        var message = 'BOB GEORGE & SALLY';
                        showDetails(message);

                    </script>   

                </div>

            </div>
            <hr />
            <?php include "../includes/footer.php"; ?>
        </div>


    </body>

</html>

