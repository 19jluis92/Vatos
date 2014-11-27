<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Service</title>

    <!-- Bootstrap Core CSS -->
    <link href="webroot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="webroot/css/index.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="webroot/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                <li class="sidebar-brand">
                    <a href="#top">Car Service</a>
                </li>
                <li>
                    <a href="#top">Inicio</a>
                </li>
                <li>
                    <a href="#about">Sobre Nosotros</a>
                </li>
                <li>
                    <a href="#services">Servicios</a>
                </li>
                <li>
                    <a href="#contact">Contacto</a>
                </li>
                <li>
                    <a href="./index.php?controller=home&view=dashboard">Home</a>
                </li>
                <li class="nav-header">Iniciar Sesión</li>
                <li>
                    <form class="login navbar-form" role="form" id="login-form"  method="post">

                      {if $result == null}
                      <div class="form-group"><input required type="email" placeholder="Email" class="form-control" name="name">
                      </div>
                      <div class="form-group"><input required data-placement="bottom" type="password" placeholder="Password" class="form-control" name="password">
                      </div>
                      <a href="#"  id="btn-submit">Iniciar Sesión</a>
                      <div class="summary-text alert alert-warning" role="alert">Datos no válidos.</div>
                      {else}
                      <div class="form-group">Bienvenido <a href="?controller=home&view=dashboard">Panel</a></div>
                      <a href="#" data-toggle="modal" data-target="#logout-modal" >Cerrar Sesión</a>
                      {/if}
                  </form>
              </li>
              <li class="nav-header"><a href="index.php?controller=user&view=password">Recuperar Contraseña</a></li>
          </ul>
      </nav>

      <!-- Header -->
      <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Car Service</h1>
            <h3>La mejor experiencia en verificaciones vehiculares.</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Ver más</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Nosotros checamos tu auto</h2>
                    <p class="lead">Pero en cualquier momento tu puedes checarnos a nosotros y el estado de tu auto</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Nuestros Servicios</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-automobile fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                    <strong>Live Check</strong>
                                </h4>
                                <p>Verifica el estado de tu auto desde donde sea</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-search fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                    <strong>Transparent verification</strong>
                                </h4>
                                <p>Tu puedes ver el estado de entrada y salida de tu auto, así como los cambios.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-bar-chart-o  fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                    <strong>User panel</strong>
                                </h4>
                                <p>Puedes revisar el historial de los servicios que solicitaste.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-user fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                    <strong>Personal Service</strong>
                                </h4>
                                <p>No solo eres nuestro cliente, eres parte de la familia.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Nuestras tiendas</h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
                                <br />
                                <small>
                                    <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
                                </small>
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio-item">
                            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
                            <br />
                            <small>
                                <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
                            </small>
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio-item">
                     <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
                     <br />
                     <small>
                        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
                    </small>
                </iframe>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portfolio-item">
                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
                <br />
                <small>
                    <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
                </small>
            </iframe>
        </div>
    </div>
</div>
<!-- /.row (nested) -->
</div>
<!-- /.col-lg-10 -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->
</section>

<!-- Call to Action -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong>Contacto</strong>
                </h4>
                
                <ul class="list-unstyled">
                    <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:hello@carservice.com">hello@carservice.com</a>
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <hr class="small">
                <p class="text-muted">Copyright &copy; Car Service 2014</p>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" tabindex="-1" role="dialog" id="logout-modal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Cerrar Sesión</h4>
      </div>
      <div class="modal-body">
        <p>¡Está seguro que desea cerrar sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-dark" id="btn-logout">Continuar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="webroot/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

<script src="webroot/js/vendor/bootstrap.min.js"></script>
<script src="webroot/js/vendor/jquery.validate.1.13.1.min.js"></script>
<script src="webroot/js/vendor/jquery-validate.bootstrap-tooltip.js"></script>
<!-- Custom Theme JavaScript -->
<script>
    {literal}
    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }
    $("#login-form").validate();
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $("#btn-submit").on("click",function (e) {
        e.preventDefault();
        if($("#login-form").valid())
            $.ajax({
                url: "index.php?controller=account&view=login",
                type: 'POST',
                data :  getFormData($('form')) ,
                success : function(result){
                    console.log(result);
                    if(JSON.parse(result) == null){
                        $(".summary-text").removeClass("alert-danger");
                        $(".summary-text").addClass("alert-warning");
                        $(".summary-text").text("Datos no válidos.");
                        $(".summary-text").addClass("active");
                    }
                    else{
                        window.location  = 'index.php?controller=home&view=dashboard';
                    }
                },
                error : function(result, errorCode, errorText){
                    $(".summary-text").removeClass("alert-warning");
                    $(".summary-text").addClass("alert-danger");
                    $(".summary-text").text("Opps intenta de nuevo.");
                    $(".summary-text").addClass("active");
                }
            });
return false;
});

$("#btn-logout").on("click",function (e) {
    window.location  = 'index.php?controller=account&view=logout';
})

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    {/literal}
</script>

</body>

</html>
