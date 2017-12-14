<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Home Page - Login
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
                <p> Log in </p>
            </div>
            
    <h2>Log in.</h2>

    <div class="row">
        <div class="col-md-8">
            <section id="loginForm">
                <div class="form-horizontal">
                    <h4>Use a local account to log in.</h4>
                    <hr />
                    
                    <div class="form-group">
                        <label for="MainContent_UserName" class="col-md-2 control-label">User name</label>
                        <div class="col-md-10">
                            <input name="ctl00$MainContent$UserName" type="text" id="MainContent_UserName" class="form-control" />
                            <span data-val-controltovalidate="MainContent_UserName" data-val-errormessage="The user name field is required." id="MainContent_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">The user name field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MainContent_Password" class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input name="ctl00$MainContent$Password" type="password" id="MainContent_Password" class="form-control" />
                            <span data-val-controltovalidate="MainContent_Password" data-val-errormessage="The password field is required." id="MainContent_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">The password field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <input id="MainContent_RememberMe" type="checkbox" name="ctl00$MainContent$RememberMe" />
                                <label for="MainContent_RememberMe">Remember me?</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" name="ctl00$MainContent$ctl05" value="Log in" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$MainContent$ctl05&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" class="btn btn-default disabled" />
                        </div>
                    </div>
                </div>
                <p>
                    <a id="MainContent_RegisterHyperLink" href="Register.php">Register</a>
                    if you don't have a local account.
                </p>
            </section>
        </div>

        <div class="col-md-4">
            <section id="socialLoginForm">
                

<div id="socialLoginList">
    <h4>Use another service to log in.</h4>
    <hr />
    
            <div>
                <p>Currently there are no external authentication services configured, such as using Windows authentication Log in. </p>
            </div>
        
</div>
            </section>
        </div>
    </div>

            <hr />
            <?php include "../includes/footer.php"; ?>
        </div>

    </body>
</html>
