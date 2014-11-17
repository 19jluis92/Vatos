<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>{block name=title}Car service{/block}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
  </style>
  <link rel="stylesheet" href="webroot/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="webroot/css/main.css">

  <script src="webroot/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  {block name=head}{/block}
</head>
<body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Car service center</a>
                </div>
                <div class="navbar-collapse collapse">
                  <form class="navbar-form navbar-right login" role="form" method="post">
                 
                  {if isset($loggedin)}
                    
                    <div class="form-group">
                      <input type="text" placeholder="Email" class="form-control" name="name"   value='.$name.' readonly>
                    </div>
                     
                    <div class="form-group">
                      <input type="password"  class="form-control" name="password"  value="******" readonly>
                    </div>
                     
                    <button  type="Post" class="btn btn-success"
                     >Logout</button>
                  {else}
                   
                    <div class="form-group">
                      <input type="text" placeholder="Email" class="form-control" name="name">
                    </div>
                      
                    <div class="form-group">
                      <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                      
                    <button type="submit" class="btn btn-success"  value="login">Sign in</button>
                  {/if}
                
          </form>
                </div><!--/.navbar-collapse -->
              </div>
            </div>

            <div class="row">
              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="#">Menu <span class="sr-only">(current)</span></a></li>
                  <li><a href="index.php?controller=home">home</a></li>
                  <li><a href="index.php?controller=user" >User</a></li>
                  <li><a href="index.php?controller=Employee">Employee</a></li>
                  <li><a href="index.php?controller=client">client</a></li>
                  <li><a href="index.php?controller=bump">bump</a></li>
                  <li><a href="index.php?controller=city">city</a></li>
                  <li><a href="index.php?controller=cartype">cartype</a></li>
                  <li><a href="index.php?controller=color">color</a></li>
                  <li><a href="index.php?controller=department">department</a></li>
                  <li><a href="index.php?controller=inspection">inspection</a></li>
                  <li><a href="index.php?controller=relocation">relocation</a></li>
                  <li><a href="index.php?controller=service">service</a></li>
                  <li><a href="index.php?controller=severity">severity</a></li>
                  <li><a href="index.php?controller=vehicle">vehicle</a></li>
                  <li><a href="index.php?controller=country">country</a></li>
                  <li><a href="index.php?controller=state">state</a></li>
                  <li><a href="index.php?controller=carworkshop">carworkshop</a></li>
                  <li><a href="index.php?controller=workshopphone">workshopphone</a></li>
                  <li><a href="index.php?controller=location">location</a></li>
                  <li><a href="index.php?controller=carmodel">carmodel</a></li>
                  <li><a href="index.php?controller=brand">brand</a></li>
                  <li><a href="index.php?controller=account">account</a></li>
                </ul>
                
               
              </div>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                {block name=body}{/block} 
              </div>
            </div>
            <footer>
              <p>&copy; Company 2014</p>
            </footer>
          </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
          <script>window.jQuery || document.write('<script src="webroot/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

          <script src="webroot/js/vendor/bootstrap.min.js"></script>

          <script src="webroot/js/main.js"></script>

          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
          {literal}
          <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
          </script>
          {/literal}
          {block name=scripts}{/block}
        </body>
        </html>
