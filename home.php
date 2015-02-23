 <?php   include("modelo/mseguridad.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/estrati.ico">    

    <title>Sistema de estratificacion socioeconomica</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/miestilo.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.min.css">
    <style type="text/css" class="init">
    </style>
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap-submenu.min.js" defer></script>
    <script type="text/javascript" language="javascript" class="init">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <?php
            $idperfil = $_SESSION['perfil'];
            $usuario = $_SESSION['usuario'];
        ?> 
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Sistema de Estratificación Socioeconomica</a>
                <div class="navbar-brand" style="margin-left: 650px"><small><strong><?php echo ucfirst($usuario); ?></strong></small></div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="" target="_blank">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Consulta Estrato
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="home.php?var=15"><i class="fa fa-user fa-fw"></i> Mi perfil</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="vista/salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php
                include("menu.php");
            ?>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            $perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
                            $var = isset($_GET["var"]) ? $_GET["var"]:NULL;
                            $up = isset($_GET["up"]) ? $_GET["up"]:NULL;
                            if (is_null($var)) {
                                include("vista/vpresent.php"); 
                            }
                            if ($var==10) {
                                include("vista/vusuario.php");
                            }
                            if ($var==15) {
                                include("vista/vmiperfil.php");
                            }
                            if ($var==20) {
                                include("vista/vlistusu.php");
                            }
                            if ($var==25) {
                                include("vista/vcambiopass.php");
                            }
                            if ($var==30) {
                                include("vista/vperfil.php");
                            }
                            if ($var==40) {
                                include("vista/vpredio.php");
                            }
                            if ($var==45) {
                                include("vista/veditpred.php");
                            }
                            if ($var==50) {
                                include("vista/vconspred.php");
                            }
                            if ($var==55) {
                                include("vista/vestratifica.php");
                            }
                            if ($var==56) {
                                include("vista/veditobs.php");
                            }
                            if ($var==60) {
                                include("vista/vsimucp.php");
                            }
                            if ($var==70) {
                                include("vista/vsimuzr.php");
                            }
                            if ($var==80) {
                                include("vista/vconsestrato.php");
                            }
                            if ($var==90) {
                                include("vista/vestadi.php");
                            }
                            if ($var==95) {
                                include("vista/vestver.php");
                            }
                            if ($var==100) {
                                include("vista/vsolint.php");
                            }
                            if ($var==110) {
                                include("vista/vsolicitud.php");
                            }
                            if ($var==120) {
                                include("vista/vsolicitante.php");
                            }
                            if ($var==125) {
                                include("vista/vsolicitudes.php");
                            }
                            if ($var==126) {
                                include("vista/vsolicitudgen.php");
                            }
                            if ($var==130) {
                                include("vista/vbansol.php");
                            }
                            if ($var==135) {
                                include("vista/vcierresol.php");
                            }
                            if ($var==140) {
                                include("vista/vestratificar.php");
                            }
                            if ($var==145) {
                                include("vista/vcarga.php");
                            }
                            if ($var==150) {
                                include("vista/vdecretos.php");
                            }
                            if ($var==155) {
                                include("vista/vres.php");
                            }
                            if ($var==160) {
                                include("vista/vactas.php");
                            }
                        ?>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    
    <script type="text/javascript" language="javascript" src="js/bootstrap-submenu.js" defer></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap-submenu.min.js" defer></script>
    <script type="text/javascript" language="javascript">
            $('.dropdown-submenu > a').submenupicker();
        </script>

</body>

</html>
