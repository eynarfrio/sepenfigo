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
        <div class="ch-container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 center login-header">
                        <h2>BIENVENIDO A SEPENFIGO</h2>
                    </div>
                    <!--/span-->
                </div><!--/row-->

                <div class="row">
                    <div class="well col-md-5 center login-box">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content') ?>
                    </div>
                    <!--/span-->
                </div><!--/row-->
            </div><!--/fluid-row-->

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
        <!--<script src="<?php echo $this->webroot; ?>js/charisma.js"></script>-->


    </body>
</html>