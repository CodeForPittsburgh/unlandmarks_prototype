<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Unlandmark Location Maintenance
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
                <p> Location Utilities </p>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <form>
                        <input type="text" id="landmark_type" size="35">
                        <!-- <input type="submit" class="button" name="insert" value="insert" /> -->
                        <!-- <button id="Save" name="name" >Save</button> -->
                        <button id="Save" name="Save" type="button" onclick="msgme()">Save &raquo;</button>

                    </form>
                </div>
                <div class="col-sm-4">
                    <?php include "../Controller/unlandmark_type_list.php"; ?>
                </div>
            </div>
            <hr />
            <?php include "../includes/footer.php"; ?>
        </div>
        <script>
            $(function () {
                $('input[type="checkbox"]').click(function () {
                    var id = stripid($(this).attr('id'));
                    var something = 'HMMMM'; //$(this).attr('description');
                    //var value=$(this).val();
                    if ($(this).prop('checked')) {
                        // do something
                        something = 'Checked -- true';
                        alert('idt:' + id + ' something:' + something);
                        update_verification(id,'true');
                    } else
                    {
                        something = 'unChecked -- false';
                        alert('idf:' + id + ' something:' + something);
                        update_verification(id,'false');
                    }
                });

            });

            function msgme() {
                obj = {landmark_type_data: document.getElementById('landmark_type').value};
                var str_json = JSON.stringify(obj);
                alert(str_json);
                openme = "../Controller/LocationType.php?name=" + str_json;
                //openme = "createTable.php?mindate=" + startdate + "&maxdate=" + enddate + parmlist;
                alert(openme);
                window.open(openme, "_self");
            }
            function update_verification(id,status) {
                obj = {landmark_type_id:id, verification_indcator: status};
                var str_json = JSON.stringify(obj);
                alert(str_json);
                openme = "../Controller/LocationType.php?name=" + str_json;
                //openme = "createTable.php?mindate=" + startdate + "&maxdate=" + enddate + parmlist;
                alert(openme);
                window.open(openme, "_self");
            }
            function stripid(id)
            {
                id = id.replace("id", "");
                return id;
            }
        </script>

    </body>

</html>