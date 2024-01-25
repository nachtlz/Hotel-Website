<?php 

require '../Router.php';
require '../controllers/DisponibilidadController.php';
require '../controllers/ReservaController.php';
require '../controllers/ClienteController.php';
require '../controllers/HotelController.php';
$url = "/webservice/public";

$router = new Router();

//Hoteles
$router->get($url . "/", [HotelController::class, "index"]);

//Disponibilidad
$router->get($url . "/disponibilidad", [DisponibilidadController::class, "index"]);
$router->post($url . "/disponibilidad", [DisponibilidadController::class, "index"]);

//Reserva
$router->get($url . "/misreservas", [ReservaController::class, "index"]);

//Cliente
$router->get($url . "/autenticacion", [ClienteController::class, "index"]);
$router->post($url . "/autenticacion", [ClienteController::class, "index"]);
$router->post($url . "/codigo", [ClienteController::class, "addCodigo"]);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();