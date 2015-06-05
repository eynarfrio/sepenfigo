<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
            ===
            This comment should NOT be removed.
            Charisma v2.0.0
    
            Copyright 2012-2014 Muhammad Usman
            Licensed under the Apache License v2.0
            http://www.apache.org/licenses/LICENSE-2.0
    
            http://usman.it
            http://twitter.com/halalit_usman
            ===
        -->
        <meta charset="utf-8">
        <title>SEPENFIGO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="Muhammad Usman">

        <!-- The styles -->
        <link id="bs-css" href="<?php echo $this->webroot; ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="<?php echo $this->webroot; ?>css/charisma-app.css" rel="stylesheet">
        <link href='<?php echo $this->webroot; ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='<?php echo $this->webroot; ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/uploadify.css' rel='stylesheet'>
        <link href='<?php echo $this->webroot; ?>css/animate.min.css' rel='stylesheet'>

        <!-- jQuery -->
        <script src="<?php echo $this->webroot; ?>bower_components/jquery/jquery.min.js"></script>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="<?php echo $this->webroot; ?>img/favicon.ico">

    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar navbar-default" role="navigation">

            <div class="navbar-inner">
                <button type="button" class="navbar-toggle pull-left animated flip">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="<?php echo $this->webroot; ?>img/logo20.png" class="hidden-xs"/>
                    <span>Penfigo</span></a>

                <!-- user dropdown starts -->
                <!--<div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>-->
                <!-- user dropdown ends -->


            </div>
        </div>
        <!-- topbar ends -->
        <div class="ch-container">
            <div class="row">

                <!-- left menu starts -->
                <div class="col-sm-2 col-lg-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>
                            <?php echo $this->element('sidebar/administrador') ?>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <!-- left menu ends -->
                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content') ?>
                    <!-- content ends -->
                </div><!--/#content.col-md-0-->
            </div><!--/fluid-row-->



            <hr>
            <style>
                .modal .modal-body {
                    max-height: 400px;
                    overflow-y: auto;
                    overflow-x: hidden;
                }
            </style>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">
                        <div id="divmodalcargando">
                            <div class="modal-body" align="center">
                                <p>
                                    <img src="<?php echo $this->webroot; ?>img/ajax-loaders/ajax-loader-4.gif">
                                </p>
                            </div>
                        </div>
                        <div id="divmodalcont">
                        </div>
                    </div>
                </div>
            </div>
            <!--<footer class="row">
                <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                        Usman</a> 2012 - 2014</p>

                <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                        href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
            </footer>-->

        </div><!--/.fluid-container-->

        <!-- external javascript -->

        <script src="<?php echo $this->webroot; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="<?php echo $this->webroot; ?>js/jquery.cookie.js"></script>
        <!-- calender plugin -->
        <script src='<?php echo $this->webroot; ?>bower_components/moment/min/moment.min.js'></script>
        <script src='<?php echo $this->webroot; ?>bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
        <!-- data table plugin -->
        <script src='<?php echo $this->webroot; ?>js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="<?php echo $this->webroot; ?>bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="<?php echo $this->webroot; ?>bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="<?php echo $this->webroot; ?>js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="<?php echo $this->webroot; ?>bower_components/responsive-tables/responsive-tables.js"></script>
        <!-- tour plugin -->
        <script src="<?php echo $this->webroot; ?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!-- star rating plugin -->
        <script src="<?php echo $this->webroot; ?>js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="<?php echo $this->webroot; ?>js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="<?php echo $this->webroot; ?>js/jquery.autogrow-textarea.js"></script>
        <!-- multiple file upload plugin -->
        <script src="<?php echo $this->webroot; ?>js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="<?php echo $this->webroot; ?>js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="<?php echo $this->webroot; ?>js/charisma.js"></script>
        <script>
          function cargarmodal(urll)
          {
              jQuery("#divmodalcargando").show();
              jQuery('#myModal').modal('show', {backdrop: 'static'});
              jQuery("#divmodalcont").load(urll, function (responseText, textStatus, req) {
                  if (textStatus == "error")
                  {
                      alert("error!!!");
                  }
                  else {
                      jQuery("#divmodalcargando").hide();
                  }
              });

          }
          function mensaje_noty(texto, vlayout, vtype) {
              var options = {
                  text: texto,
                  layout: vlayout,
                  type: vtype
              };
              noty(options);
          }
        </script>
    </body>
</html>