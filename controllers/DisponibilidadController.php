<?php 

class DisponibilidadController {

    public static function index(Router $router) {

        $disponibilidadesFiltradas = [];
        $hotel = [];
        
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $idHotel = $_POST["idHotel"];
            $fechaInicio = date('Y-m-d', strtotime($_POST["fechaInicio"]));
            $fechaFin = date('Y-m-d', strtotime($_POST["fechaFin"]));
            $adultos = $_POST["adultos"];
            $menores = $_POST["menores"];
            $url = 'http://localhost:8080/apibd?comanda=reserva-getHabitacionesDisponiblesByReserva&dades=%3Creservas%3E%3Creserva%3E%3CidHotel%3E' . $idHotel . '%3C/idHotel%3E%3CfechaInicio%3E'. $fechaInicio .'%3C/fechaInicio%3E%3CfechaFin%3E'. $fechaFin .'%3C/fechaFin%3E%3C/reserva%3E%3C/reservas%3E';

            // Leemos el json de la API
            $jsonData = file_get_contents($url);

            // Decodificar el json en un array PHP
            $disponibilidades = json_decode($jsonData);

            // Verificar si la decodificación fue exitosa
            if ($disponibilidades === null) {
                // Hubo un error al decodificar el JSON
                echo "Error al decodificar el JSON.";
            } else {


                foreach ($disponibilidades as $dispo) {
                    // Verificar si las propiedades esperadas existen antes de acceder a ellas
                    if (isset($dispo->adultos, $dispo->menores, $dispo->disponibles)) {
                        // Filtrar según las condiciones
                        if ($dispo->adultos >= $adultos && $dispo->menores >= $menores && $dispo->disponibles > 0) {
                            $disponibilidadesFiltradas[] = $dispo;
                        }
                    } else {
                        // Alguna propiedad esperada no está presente en el objeto $dispo
                        echo "Error: Propiedades faltantes en el objeto dispo.";
                    }
                }
            }

            $url = 'http://localhost:8080/apibd?comanda=hotel-getHotelById&dades=%3Choteles%3E%3Chotel%3E%3CidHotel%3E' . $idHotel . '%3C/idHotel%3E%3C/hotel%3E%3C/hoteles%3E';

            //Leemos el json de la API
            $jsonData = file_get_contents($url);

            //Decodificar el json en un array php
            $hotel = json_decode($jsonData);

            $hotel = $hotel[0];

            session_start();
            $_SESSION['idHotel'] = $idHotel;
            $_SESSION['fechaInicio'] = $fechaInicio;
            $_SESSION['fechaFin'] = $fechaFin;
            $_SESSION['adultos'] = $adultos;
            $_SESSION['menores'] = $menores;

        }

        $router->render("disponibilidad/index", [
            "titulo" => "Disponibilidades",
            "disponibilidades" => $disponibilidadesFiltradas,
            "hotel" => $hotel
        ]);
    }
}