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
  <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
  <link rel="stylesheet" href="webroot/css/theme.css">
  <link rel="stylesheet" href="webroot/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="webroot/css/datepicker3.css">
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
            <header class="header">
              <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Car Service
              </a>
              <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                  <ul class="nav navbar-nav">
                   <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-user"></i>
                      <span>Jane Doe <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      {if isset($loggedin)}

                      <form class="navbar-form navbar-right login" role="form" method="post">


                        <div class="form-group">
                          <input type="text" placeholder="Email" class="form-control" name="name"   value='.$name.' readonly>
                        </div>

                        <div class="form-group">
                          <input type="password"  class="form-control" name="password"  value="******" readonly>
                        </div>

                        <button  type="Post" class="btn btn-success">Logout</button>
                        {else}
                        <span></span>
<!--
                        <div class="form-group">
                          <input type="text" placeholder="Email" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                          <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>

                        <button type="submit" class="btn btn-success"  value="login">Sign in</button>
                      -->

                    </form>
                    {/if}
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                      
       
        
                      <p>
                        Sesion
                        
                      </p>
                    </li>
                    <!-- Menu Body 
                    <li class="user-body">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </li>
                     Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        
                      </div>
                      <div class="pull-right">
                        
                        <a href="#"  class="btn btn-default btn-flat" data-toggle="modal" data-target="#logout-modal" >Cerrar Sesión</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
          <div class="left-side sidebar-offcanvas">
            <section class="sidebar">    
              <div class="user-panel">
                <div class="info">
                  <p>Menu Principal</p>
                </div>
              </div>
              <ul class="sidebar-menu">
                {if $role == 'admin' || $role == 'superadmin' || $role == 'user'}
                <li><a href="index.php?controller=area"><i class="fa fa-edit"></i>Áreas</a></li>     
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>Servicio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="index.php?controller=inventory"><i class="fa fa-angle-double-right"></i>Mostrar todos los servicios</a></li>
                    <li><a href="index.php?controller=inventory&view=create"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                  </ul>
                </li>
                {/if}
                {if $role == 'admin'}
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>User</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="index.php?controller=user"><i class="fa fa-angle-double-right"></i>Mostrar todos los Usuarios</a></li>
                    <li><a href="index.php?controller=user&view=create"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                  </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Vehiculo</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=vehicle" ><i class="fa fa-angle-double-right"></i>Mostrar todos los vehiculos</a></li>
                  <li><a href="index.php?controller=vehicle&view=create"><i class="fa fa-angle-double-right"></i>Vehiculo</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Employee</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=Employee" ><i class="fa fa-angle-double-right"></i>Mostrar todos los Empleados</a></li>
                  <li><a href="index.php?controller=Employee&view=create"><i class="fa fa-angle-double-right"></i>Empleado</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Client</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=client" ><i class="fa fa-angle-double-right"></i>Mostrar todos los Clientes</a></li>
                  <li><a href="index.php?controller=client&view=create"><i class="fa fa-angle-double-right"></i>Clientes</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Ciudad</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=city" ><i class="fa fa-angle-double-right"></i>Mostrar todas las Ciudades</a></li>
                  <li><a href="index.php?controller=city&view=create"><i class="fa fa-angle-double-right"></i>Ciudad</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Tipo</span>
                <i class="fa fa-angle-left pull-right"></i> de carro</a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=cartype" ><i class="fa fa-angle-double-right"></i>Mostrar todos los carros</a></li>
                  <li><a href="index.php?controller=cartype&view=create"><i class="fa fa-angle-double-right"></i>Carro</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Color</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=color" ><i class="fa fa-angle-double-right"></i>Mostrar todos los colores</a></li>
                  <li><a href="index.php?controller=color&view=create"><i class="fa fa-angle-double-right"></i>Color</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Departamentos</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=department" ><i class="fa fa-angle-double-right"></i>Mostrar todos los Departamentos</a></li>
                  <li><a href="index.php?controller=department&view=create"><i class="fa fa-angle-double-right"></i>Departamento</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Inspeccion</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=inspection" ><i class="fa fa-angle-double-right"></i>Mostrar Inspecciones</a></li>
                  <li><a href="index.php?controller=inspection&view=create"><i class="fa fa-angle-double-right"></i>Inspeccion</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Recolocacion</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=relocation" ><i class="fa fa-angle-double-right"></i>Mostrar Recolocaciones</a></li>
                  <li><a href="index.php?controller=relocation&view=create"><i class="fa fa-angle-double-right"></i>Recolocacion</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Servicio</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=service" ><i class="fa fa-angle-double-right"></i>Mostrar Servicios</a></li>
                  <li><a href="index.php?controller=service&view=create"><i class="fa fa-angle-double-right"></i>Servicio</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Severidad</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=severity" ><i class="fa fa-angle-double-right"></i>Mostrar Severidades</a></li>
                  <li><a href="index.php?controller=severity&view=create"><i class="fa fa-angle-double-right"></i>Severidad</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Pais</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="index.php?controller=country"><i class="fa fa-angle-double-right"></i>Mostrar Pais</a></li>
                  <li><a href="index.php?controller=country&view=create"><i class="fa fa-angle-double-right"></i>Pais</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Estado</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=state" ><i class="fa fa-angle-double-right"></i>Mostrar Estados</a></li>
                  <li><a href="index.php?controller=state&view=create"><i class="fa fa-angle-double-right"></i>Estado</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Sucursales</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=carworkshop" ><i class="fa fa-angle-double-right"></i> Mostrar Sucursal</a></li>
                  <li><a href="index.php?controller=carworkshop&view=create"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Location</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=location" ><i class="fa fa-angle-double-right"></i>Mostrar Lugar</a></li>
                  <li><a href="index.php?controller=location&view=create"><i class="fa fa-angle-double-right"></i>Lugar</a></li>
                </ul>
              </li>
              <li  class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Modelo de Auto</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="index.php?controller=carmodel" ><i class="fa fa-angle-double-right"></i>Mostrar Autos</a></li>
                  <li><a href="index.php?controller=carmodel&view=create"><i class="fa fa-angle-double-right"></i>Modelo</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-edit"></i> <span>Marca</span>
                <i class="fa fa-angle-left pull-right"></i></a>

                <ul class="treeview-menu">
                  <li><a href="index.php?controller=brand" ><i class="fa fa-angle-double-right"></i>Mostrar Marcas</a></li>
                  <li><a href="index.php?controller=brand&view=create"><i class="fa fa-angle-double-right"></i>Marca</a></li>
                </ul>
              </li>
              {/if}
            </ul>
          </section>
        </div>
        <div class="right-side">
          <section class="content-header">
            <h1>
              {block name=pageheader}Dashboard{/block}
              <small>{block name=pagesubheader}control panel{/block}</small>
            </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                      </ol>-->
                    </section>
                    <h1 class="page-header"></h1>
                    <section class="content">
                      {block name=body}{/block} 
                    </section>
                  </div>
                </div>
                <footer>
                  <p>&copy; Company 2014</p>
                </footer>
              </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
              <script>window.jQuery || document.write('<script src="webroot/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

    <script src="webroot/js/vendor/bootstrap.min.js"></script>
    <script src="webroot/js/vendor/moment.min.js"></script>
    <script src="webroot/js/vendor/bootstrap-datetimepicker.js"></script>
    <script src="webroot/js/main.js"></script>
    <script src="webroot/js/ajax.js"></script>
 
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    {literal}
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
