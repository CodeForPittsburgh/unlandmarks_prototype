<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - About
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

<!--        <div class="container body-content">
            <div class="jumbotron" style="text-align:center; background-image:url(../../images/unlandmarks.jpg);background-size: 300px 350px;background-repeat: no-repeat;">
                <h1>Welcomes you</h1>
                <p> About </p>
            </div>           -->

            <h2>About our application:</h2>
            <p>
                Pittsburghers have serious respect for their city’s history. Many of them are also long-term residents of their particular neighborhoods, and proud of the many local businesses and monuments that once existed in their surround. We are a city in many ways haunted by the past, and you can see in the physical grid of the city the spaces where great engines of industry once stood. Newcomers get lost in our city. It isn’t easy to give them directions. Three rights never make a left. The waypoints described are often long-gone, making the directions useless to someone who is new in town. It’s a friction point - a split between the city’s newer residents and those who have lived here for decades. But it isn’t - it is endearing and it cements the knowledge of what came before into the memories of a new group of residents. It means neighbors talk to neighbors, and that’s always good in this town.
            </p>
            <h1> License </h1>
        <!--    <p> Under the General Purpose Site License</p>
            <h1> Terms and Conditions </h1>-->
            <p>
                <?php print "<p>&copy; " . date("Y") . " - Code for Pittsburgh</p>"; ?>
                Licensed under the Apache License, Version 2.0 (the "License");
                you may not use this file except in compliance with the License.
                You may obtain a copy of the License at

                <a href="http://www.apache.org/licenses/LICENSE-2.0">http://www.apache.org/licenses/LICENSE-2.0</a>

                Unless required by applicable law or agreed to in writing, software
                distributed under the License is distributed on an "AS IS" BASIS,
                WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
                See the License for the specific language governing permissions and
                limitations under the License.
            </p>
            <h1> Terms</h1>

            <a href="https://developers.google.com/maps/terms">Google Terms</a>
            <h1> Conditions </h1>
            <p> What you can do </p>
            <ul>
                <li><a href="https://data.wprdc.org/dataset/property-assessments">Allegheny County Real Estate Data from WPRDC</a></li>
            </ul>
            <p> What you can't do </p>
            <ul>
                <li>Nothing yet</li>
            </ul>
            <hr />
            <?php include "../includes/footer.php"; ?>


    </body>
</html>
