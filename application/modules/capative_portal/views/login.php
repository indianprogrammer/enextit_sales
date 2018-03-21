<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <meta http-equiv="Cache-control" content="no-cache">
        <meta http-equiv="Pragma" content="no-cache">

        <SCRIPT LANGUAGE="JavaScript">
            var blur = 0;
            var starttime = new Date();
            var startclock = starttime.getTime();
            var mytimeleft = 0;

            function doTime() {
                window.setTimeout("doTime()", 1000);
                t = new Date();
                time = Math.round((t.getTime() - starttime.getTime()) / 1000);
                if (mytimeleft) {
                    time = mytimeleft - time;
                    if (time <= 0) {
                        window.location = "/hotspotlogin.php?res=popup3&uamip=<?= $uamip ?>&uamport=<?= $uamport ?>";
                    }
                }
                if (time < 0)
                    time = 0;
                hours = (time - (time % 3600)) / 3600;
                time = time - (hours * 3600);
                mins = (time - (time % 60)) / 60;
                secs = time - (mins * 60);
                if (hours < 10)
                    hours = "0" + hours;
                if (mins < 10)
                    mins = "0" + mins;
                if (secs < 10)
                    secs = "0" + secs;
                title = "Online time: " + hours + ":" + mins + ":" + secs;
                if (mytimeleft) {
                    title = "Remaining time: " + hours + ":" + mins + ":" + secs;
                }
                if (document.all || document.getElementById) {
                    document.title = title;
                }
                else {
                    self.status = title;
                }
            }

            function popUp(URL) {
                if (self.name != "chillispot_popup") {
                    chillispot_popup = window.open(URL, 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=375');
                }
            }

            function doOnLoad(result, URL, userurl, redirurl, timeleft) {
                if (timeleft) {
                    mytimeleft = timeleft;
                }
                if ((result == 1) && (self.name == "chillispot_popup")) {
                    doTime();
                }
                if ((result == 1) && (self.name != "chillispot_popup")) {
                    chillispot_popup = window.open(URL, 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=375');
                }
                if ((result == 2) || result == 5) {
                    document.form1.UserName.focus()
                }
                if ((result == 2) && (self.name != "chillispot_popup")) {
                    chillispot_popup = window.open('', 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=200');
                    chillispot_popup.close();
                }
                if ((result == 12) && (self.name == "chillispot_popup")) {
                    doTime();
                    if (redirurl) {
                        opener.location = redirurl;
                    }
                    else if (opener.home) {
                        opener.home();
                    }
                    else {
                        opener.location = "about:home";
                    }
                    self.focus();
                    blur = 0;
                }
                if ((result == 13) && (self.name == "chillispot_popup")) {
                    self.focus();
                    blur = 1;
                }
            }

            function doOnBlur(result) {
                if ((result == 12) && (self.name == "chillispot_popup")) {
                    if (blur == 0) {
                        blur = 1;
                        self.focus();
                    }
                }
            }
        </script>

        <style>
            /* devanagari */
            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                src: local('Poppins Regular'), local('Poppins-Regular'), url(<?= base_url('assets/fonts/gG8m82oGcrBJF727xHU04fY6323mHUZFJMgTvxaG2iE.woff2') ?>) format('woff2');
            }
            /* latin-ext */
            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                src: local('Poppins Regular'), local('Poppins-Regular'), url(<?= base_url('assets/fonts/F4YWuALHubF63LLQPw0rMfY6323mHUZFJMgTvxaG2iE.woff2') ?>) format('woff2');
            }
            /* latin */
            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                src: local('Poppins Regular'), local('Poppins-Regular'), url(<?= base_url('assets/fonts/HLBysyo0MQBO_7E-DWLwzg.woff2') ?>) format('woff2');
            }

            /* BASIC */

            html {
                background-color: #56baed;
            }

            body {
                font-family: "Poppins", sans-serif;
                height: 100vh;
            }

            a {
                color: #92badd;
                display:inline-block;
                text-decoration: none;
                font-weight: 400;
            }

            h2 {
                text-align: center;
                font-size: 16px;
                font-weight: 600;
                text-transform: uppercase;
                display:inline-block;
                margin: 40px 8px 10px 8px; 
                color: #cccccc;
            }



            /* STRUCTURE */

            .wrapper {
                display: flex;
                align-items: center;
                flex-direction: column; 
                justify-content: center;
                width: 100%;
                min-height: 100%;
                padding: 20px;
            }

            #formContent {
                -webkit-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                background: #fff;
                padding: 30px;
                width: 90%;
                max-width: 450px;
                position: relative;
                padding: 0px;
                -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                text-align: center;
            }

            #formFooter {
                background-color: #f6f6f6;
                border-top: 1px solid #dce8f1;
                padding: 25px;
                text-align: center;
                -webkit-border-radius: 0 0 10px 10px;
                border-radius: 0 0 10px 10px;
            }



            /* TABS */

            h2.inactive {
                color: #cccccc;
            }

            h2.active {
                color: #0d0d0d;
                border-bottom: 2px solid #5fbae9;
            }



            /* FORM TYPOGRAPHY*/

            input[type=button], input[type=submit], input[type=reset]  {
                background-color: #56baed;
                border: none;
                color: white;
                padding: 15px 80px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                text-transform: uppercase;
                font-size: 13px;
                -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
                box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
                margin: 5px 20px 40px 20px;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
                background-color: #39ace7;
            }

            input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
                -moz-transform: scale(0.95);
                -webkit-transform: scale(0.95);
                -o-transform: scale(0.95);
                -ms-transform: scale(0.95);
                transform: scale(0.95);
            }

            input[type=text] {
                background-color: #f6f6f6;
                border: none;
                color: #0d0d0d;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 5px;
                width: 85%;
                border: 2px solid #f6f6f6;
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                -ms-transition: all 0.5s ease-in-out;
                -o-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
            }

            input[type=text]:focus {
                background-color: #fff;
                border-bottom: 2px solid #5fbae9;
            }

            input[type=text]:placeholder {
                color: #cccccc;
            }



            /* ANIMATIONS */

            /* Simple CSS3 Fade-in-down Animation */
            .fadeInDown {
                -webkit-animation-name: fadeInDown;
                animation-name: fadeInDown;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            @-webkit-keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }

            @keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }

            /* Simple CSS3 Fade-in Animation */
            @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
            @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
            @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

            .fadeIn {
                opacity:0;
                -webkit-animation:fadeIn ease-in 1;
                -moz-animation:fadeIn ease-in 1;
                animation:fadeIn ease-in 1;

                -webkit-animation-fill-mode:forwards;
                -moz-animation-fill-mode:forwards;
                animation-fill-mode:forwards;

                -webkit-animation-duration:1s;
                -moz-animation-duration:1s;
                animation-duration:1s;
            }

            .fadeIn.first {
                -webkit-animation-delay: 0.4s;
                -moz-animation-delay: 0.4s;
                animation-delay: 0.4s;
            }

            .fadeIn.second {
                -webkit-animation-delay: 0.6s;
                -moz-animation-delay: 0.6s;
                animation-delay: 0.6s;
            }

            .fadeIn.third {
                -webkit-animation-delay: 0.8s;
                -moz-animation-delay: 0.8s;
                animation-delay: 0.8s;
            }

            .fadeIn.fourth {
                -webkit-animation-delay: 1s;
                -moz-animation-delay: 1s;
                animation-delay: 1s;
            }

            /* Simple CSS3 Fade-in Animation */
            .underlineHover:after {
                display: block;
                left: 0;
                bottom: -10px;
                width: 0;
                height: 2px;
                background-color: #56baed;
                content: "";
                transition: width 0.2s;
            }

            .underlineHover:hover {
                color: #0d0d0d;
            }

            .underlineHover:hover:after{
                width: 100%;
            }



            /* OTHERS */

            *:focus {
                outline: none;
            } 

            #icon {
                width:60%;
            }

            * {
                box-sizing: border-box;
            }
        </style>

    </head>

    <body>

        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->
                <h2 class="active"> Sign In </h2>
                <h2 class="inactive underlineHover">Sign Up </h2>

                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="<?= base_url('assets/img/icon.svg') ?>" id="icon" alt="User Icon" />
                    <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                    ?>
                </div>

                <!-- Login Form -->
                <form action="capative_portal/login_action" method="post">
                    <input type="hidden" name="challenge" value="<?= $challenge ?>">
                    <input type="hidden" name="uamip" value="<?= $uamip ?>">
                    <input type="hidden" name="uamport" value="<?= $uamport ?>">
                    <input type="hidden" name="userurl" value="<?= $userurl ?>">
                    <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
                    <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                    <input type="submit" class="fadeIn fourth" name="button" value="Log In" onClick="javascript:popUp('<?= base_url($this->router->fetch_class(). '/popup_login/'.$uamip.'/'.$uamport) ?>')">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div>

            </div>
        </div>
    </body>
</html>
