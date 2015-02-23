<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/estrati.ico">

    <title>Estratificacion</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
        <div class="titulo">
            <h1>Sistema de Información <br>de Estratificación Socio-económica del municipio de Chía - SIES</h1>
        </div>
	<div class="row">
	</div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor ingrese sus datos</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="modelo/mcontrol.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Documento" name="documento" type="text" autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Ingresar">
                                        <?php
                                            $erroring = isset($_GET['errorusuario']) ? $_GET['errorusuario']:NULL;
                                            if(strcmp($erroring, "si")==0)
                                            {
                                                echo "<span class='label label-danger'>Por favor verifique sus datos</span>";       
                                            }
                                        ?>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
                
                    <span class="help-block">Bienvenido al sistema de estratificación. Si no tiene acceso comuniquese con el administrador del sistema.</span>
                
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
