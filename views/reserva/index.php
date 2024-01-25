<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="menu-item">
            <div class="container">
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="/webservice/public/">Página Principal</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Mis reservas</h2>
                        <div class="bt-option">
                            <a href="/webservice/public/">Principal</a>
                            <span>Mis reservas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">

                <?php
                    if(empty($reservas)) {
                        ?>
                        <h3>No tienes ninguna reserva registrada.</h3>
                        <?php
                    } else {
                ?>
                <?php foreach($reservas as $reserva) {?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="img/<?php echo $reserva->imagen; ?>.jpg" alt="">
                            <div class="ri-text">
                                <h4>Identificador: #<?php echo $reserva->idReserva; ?></h4>
                                <h3><?php echo $reserva->precio; ?>€<span>/Pernight</span></h3>
                                <h2><?php echo $reserva->descripcion; ?> en <?php echo $reserva->nombre; ?></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Check In:</td>
                                            <td><?php echo $reserva->fechaInicio; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Check Out:</td>
                                            <td><?php echo $reserva->fechaFin; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Adultos:</td>
                                            <td><?php echo $reserva->adultos; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Menores:</td>
                                            <td><?php echo $reserva->menores; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Tlf hotel:</td>
                                            <td><?php echo $reserva->telefono; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3><?php 
                                
                                $fechaInicio = new DateTime($reserva->fechaInicio);
                                $fechaFin = new DateTime($reserva->fechaFin);

                                $diferencia = $fechaInicio->diff($fechaFin);

                                $diasTotales = $diferencia->days;
                                $precioTotal = $reserva->precio * $diasTotales;
                                echo $precioTotal; ?>€ en total</h3>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                
                }
                ?>
                
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>