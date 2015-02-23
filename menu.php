<?php 
    $perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;
?>
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php
                            if ($perusu!=2) 
                            {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Solicitud<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    if ($perusu==1 || $perusu==4 ||  $perusu==5) 
                                    {
                                ?>
                                <li>
                                    <a href="home.php?var=100">Urbanismo</a>
                                </li>
                                <?php
                                    } 
                                    if ($perusu==1 || $perusu==3 || $perusu==4 || $perusu==6) 
                                    {
                                ?>
                                <li>
                                    <a href="home.php?var=110">Interna</a>
                                </li>
                                <?php
                                    }
                                    if ($perusu!=2) 
                                    {
                                ?>
                                <li>
                                    <a href="home.php?var=120">Generar Solicitante</a>
                                </li>
                                <?php
                                    }
                                    if ($perusu==1 || $perusu==3 || $perusu==4) 
                                    { 
                                ?>
                                <li>
                                    <a href="home.php?var=130">Pendientes</a>
                                </li>
                                <?php
                                    }
                                    if ($perusu==1 || $perusu==3 || $perusu==4 || $perusu==6) 
                                    {     
                                ?>
                                <li>
                                    <a href="home.php?var=125">Listar</a>
                                </li>
                                <?php
                                    } 
                                ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            }  
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Predios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    if ($perusu==1 || $perusu==4) 
                                    {
                                ?>
                                <li>
                                    <a href="home.php?var=40">Nuevo predio</a>
                                </li>
                                <?php
                                    } 
                                ?>
                                <li>
                                    <a href="home.php?var=50">Consultar predio</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            if ($perusu!=6) 
                            {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Simulador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?var=60">Centro poblado</a>
                                </li>
                                <li>
                                    <a href="home.php?var=70">Zona rural</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            } 
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Estratificación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?var=80">Consulta estrato</a>
                                </li>
                                <?php
                                    if ($perusu==1) 
                                    {  
                                ?>
                                <li>
                                    <a href="home.php?var=90">Estadisticas</a>
                                </li>
                                <li>
                                    <a href="home.php?var=95">Estrato por vereda</a>
                                </li>
                                <?php
                                    }  
                                ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                            if ($perusu==1) 
                            {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?var=10">Nuevo usuario</a>
                                </li>
                                <li>
                                    <a href="home.php?var=20">Listar usuarios</a>
                                </li>
                                <li>
                                    <a href="home.php?var=30">Nuevo perfil</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            } 
                         ?>
                         <?php 
                            if ($perusu==1) 
                            {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Normatividad<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?var=150">Decretos</a>
                                </li>
                                <li>
                                    <a href="home.php?var=155">Resoluciones</a>
                                </li>
                                <li>
                                    <a href="home.php?var=160">Actas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            } 
                         ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>