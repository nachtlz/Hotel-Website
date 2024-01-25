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
                                    <li><a href="/webservice/public/autenticacion">Mis reservas</a></li>
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
                        <h2>Disponibilidad de <?php echo $hotel->nombre; ?></h2>
                        <p><?php echo $hotel->descripcion; ?> Hotel de <?php echo $hotel->categoria; ?> estrellas</p>
                        <div class="bt-option">
                            <a href="/webservice/public/"><?php echo $hotel->nombre; ?></a>
                            <span>Habitaciones</span>
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
                    if(empty($disponibilidades)) {
                        ?>
                        <h3>No hay habitaciones para esas fechas o con esas condiciones.</h3>
                        <?php
                    } else {
                ?>
                <?php foreach($disponibilidades as $dispo) {?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="img/<?php echo $hotel->imagen; ?>.jpg" alt="">
                            <div class="ri-text">
                                <h4><?php echo $dispo->descripcion; ?></h4>
                                <h3><?php echo $dispo->precio; ?>€<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Codigo:</td>
                                            <td><?php echo $dispo->codigo; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Adultos:</td>
                                            <td><?php echo $dispo->adultos; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Menores:</td>
                                            <td><?php echo $dispo->menores; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="booking-form" style="padding: 0">
                                    <form action="/webservice/public/codigo" class="formulario" method="POST">
                                        <input type="hidden" name="codigo" value="<?php echo $dispo->codigo; ?>">
                                        <button class="booking_submit" type="submit">Realizar reserva</button>
                                    </form>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>