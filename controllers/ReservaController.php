<?php

class ReservaController {

  public static function index(Router $router) {

    session_start();
    $idCliente = $_SESSION["idCliente"];

    $url = 'http://localhost:8080/apibd?comanda=reserva-getReservasByCliente&dades=%3Creservas%3E%3Creserva%3E%3CidCliente%3E'. $idCliente .'%3C/idCliente%3E%3C/reserva%3E%3C/reservas%3E';

    // Leemos el json de la API
    $jsonData = file_get_contents($url);

    // Decodificar el json en un array PHP
    $reservas = json_decode($jsonData);

    $router->render("reserva/index", [
      "titulo" => "Mis Reservas",
      "reservas" => $reservas
    ]);
  }
}