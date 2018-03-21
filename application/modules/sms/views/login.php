<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>login</title>

    

<link href="<?php echo base_url() ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>/assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <?php echo form_open('login/action_login'); ?>
              <h1>User Login</h1>
              
              <div class="row">
              <div>
                <input type="text" name="username" tabindex="1" class="form-control" placeholder="Username here..."  required="" />
              </div>
              </div>
              
              <div class="row">
              <div>
                <input type="password" name="password" tabindex="2" class="form-control" placeholder="Password here " required="" />
              </div>
              </div>
               
              <div>
                <input type="submit" name="submit" tabindex="3" class="btn btn-default">
                <a href="#" tabindex="4" class="reset_pass">Lost your password?</a>
              </div>
              
             <div class="clearfix"></div>
             <div class="text-danger">
              <?php if(isset($error_msg)){echo $error_msg;} ?>
             </div>
                <br />
              </div>   
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
