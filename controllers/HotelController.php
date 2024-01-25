<?php 

class HotelController {

    public static function index(Router $router) {

        $url = 'http://localhost:8080/apibd?comanda=hotel-getAll&dades=%3Call%3E';

        //Leemos el json de la API
        $jsonData = file_get_contents($url);

        //Decodificar el json en un array php
        $hoteles = json_decode($jsonData);

        // Verificar si la decodificación fue exitosa
        if ($hoteles === null) {
            // Hubo un error al decodificar el JSON
            echo "Error al decodificar el JSON.";
        } else {
            
            $router->render("principal/index", [
                "titulo" => "Principal",
                "hoteles" => $hoteles
            ]);
        }
    }
}