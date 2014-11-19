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
  <style type="text/css">
  </style>
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
                  <li><a href="#" data-dropdown="true" >User</a>
                      <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=user" >Mostrar todos los Usuarios</a></li>
                          <li><a href="index.php?controller=user&view=create">Usuario</a></li>
                        </ul>
                      </div>
                  </li>
                  <li>
                    <a href="#" data-dropdown="true">Vehiculo
                    </a>
                      <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=vehicle" >Mostrar todos los vehiculos</a></li>
                          <li><a href="index.php?controller=vehicle&view=create">Vehiculo</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Employee</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=Employee" >Mostrar todos los Empleados</a></li>
                          <li><a href="index.php?controller=Employee&view=create">Empleado</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Client</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=client" >Mostrar todos los Clientes</a></li>
                          <li><a href="index.php?controller=client&view=create">Clientes</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">bump</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=bump" >Mostrar todos los Bumb</a></li>
                          <li><a href="index.php?controller=bump&view=create">Bumb</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Ciudad</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=city" >Mostrar todas las Ciudades</a></li>
                          <li><a href="index.php?controller=city&view=create">Ciudad</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Tipo de carro</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=cartype" >Mostrar todos los carros</a></li>
                          <li><a href="index.php?controller=cartype&view=create">Carro</a></li>
                        </ul>
                      </div>
                  </li>
                  <li><a href="#" data-dropdown="true">color</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=color" >Mostrar todos los colores</a></li>
                          <li><a href="index.php?controller=color&view=create">Color</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Departamentos</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=department" >Mostrar todos los Departamentos</a></li>
                          <li><a href="index.php?controller=department&view=create">Departamento</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Inspaccion</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=inspection" >Mostrar Inspecciones</a></li>
                          <li><a href="index.php?controller=inspection&view=create">Inspeccion</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Recolocacion</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=relocation" >Mostrar Recolocaciones</a></li>
                          <li><a href="index.php?controller=relocation&view=create">Recolocacion</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Servicio</a>
                   <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=service" >Mostrar Servicios</a></li>
                          <li><a href="index.php?controller=service&view=create">Servicio</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="index.php?controller=severity" data-dropdown="true">Severidad</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=severity" >Mostrar Severidades</a></li>
                          <li><a href="index.php?controller=severity&view=create">Severidad</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Pais</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=country" >Mostrar Pais</a></li>
                          <li><a href="index.php?controller=country&view=create">Pais</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">Estado</a>
                  <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=state" >Mostrar Estados</a></li>
                          <li><a href="index.php?controller=state&view=create">Estado</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#"data-dropdown="true">carworkshop</a>
                     <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=carworkshop" >Mostrar carworkshop</a></li>
                          <li><a href="index.php?controller=carworkshop&view=create">carworkshop</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">workshopphone</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=workshopphone" >Mostrar workshopphone</a></li>
                          <li><a href="index.php?controller=workshopphone&view=create">workshopphone</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#" data-dropdown="true">location</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=location" >Mostrar location</a></li>
                          <li><a href="index.php?controller=location&view=create">location</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#"data-dropdown="true">Modelo de Auto</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=carmodel" >Mostrar Autos</a></li>
                          <li><a href="index.php?controller=carmodel&view=create">Modelo</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#"data-dropdown="true">Marca</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=brand" >Mostrar Marcas</a></li>
                          <li><a href="index.php?controller=brand&view=create">Marca</a></li>
                        </ul>
                    </div>
                  </li>
                  <li><a href="#"data-dropdown="true">Cuenta</a>
                    <div class="inner-side-bar">
                        <ul>
                          <li><a href="index.php?controller=account" >Mostrar Cuentas</a></li>
                          <li><a href="index.php?controller=account&view=create">Cuenta</a></li>
                        </ul>
                    </div>
                  </li>
              </div>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">{block name=pageheader}Dashboard{/block}</h1>
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
          <script src="webroot/js/ajax.js"></script>
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
          <script type="text/javascript">
            $( document ).ready(function() {
              $('a[data-dropdown="true"]').on('click',function(e) {
                $(this).next('div').slideToggle().show();
                $(this).next('div').addClass('active');
              });
            });
          </script>
          {/literal}
          {block name=scripts}{/block}
        </body>
        </html>
