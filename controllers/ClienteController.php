<?php

class ClienteController {

    public static function index(Router $router) {

        $alerta = "";
        $alertaR = "";

        if($_SERVER["REQUEST_METHOD"] === "POST") {
    
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $url = 'http://localhost:8080/apibd?comanda=cliente-getClienteByEmail&dades=%3Cclientes%3E%3Ccliente%3E%3Cemail%3E' . $email . '%3C/email%3E%3C/cliente%3E%3C/clientes%3E';
            
            //Leemos el json de la API
            $jsonData = file_get_contents($url);

            //Decodificar el json en un array php
            $cliente = json_decode($jsonData);

            $cliente = $cliente[0];

            if($_POST["registrado"] == "1") {
                if($cliente->email == "none" || $cliente->id == "null") {
                    $alerta = "Esta cuenta no está registrada";
                } else if (!password_verify($password, $cliente->password)) {
                    $alerta = "Password incorrecta";
                } else {
                    session_start();
                    $fechaInicio = $_SESSION["fechaInicio"];
                    $fechaFin = $_SESSION["fechaFin"];
                    $adultos = $_SESSION["adultos"];
                    $menores = $_SESSION["menores"];
                    $codigo = $_SESSION["codigo"];
                    $idHotel = $_SESSION["idHotel"];

                    $url = 'http://localhost:8080/apibd?comanda=reserva-addReserva&dades=%3Creservas%3E%3Creserva%3E%3CfechaInicio%3E'. $fechaInicio .
                    '%3C/fechaInicio%3E%3CfechaFin%3E'. $fechaFin .'%3C/fechaFin%3E%3Cadultos%3E'. $adultos .'%3C/adultos%3E%3Cmenores%3E'. $menores .
                    '%3C/menores%3E%3CidCliente%3E'. $cliente->idCliente .'%3C/idCliente%3E%3Ccodigo%3E'. $codigo .'%3C/codigo%3E%3CidHotel%3E'. $idHotel .'%3C/idHotel%3E%3C/reserva%3E%3C/reservas%3E';
                    echo $url;
                    //Leemos el json de la API
                    $jsonData = file_get_contents($url);
                        
                    //Decodificar el json en un array php
                    $reserva = json_decode($jsonData);

                    $_SESSION = [];
                    $_SESSION['idCliente'] = $cliente->idCliente;
                    
                    header("Location: /webservice/public/misreservas");
                }
            } else {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $telefono = $_POST["telefono"];
                $tipoId = $_POST["tipoId"];
                $id = $_POST["id"];
                $nacionalidad = $_POST["nacionalidad"];
                $edad = $_POST["edad"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                if ($nombre && $apellido && $telefono && $tipoId && $id && $nacionalidad && $edad && $email && $password) {
                    $password = password_hash($password, PASSWORD_BCRYPT);

                    $url = 'http://localhost:8080/apibd?comanda=cliente-addCliente&dades=%3Cclientes%3E%3Ccliente%3E%3Cnombre%3E'. $nombre .'%3C/nombre%3E%3Capellido%3E'. $apellido .
                    '%3C/apellido%3E%3Ctelefono%3E'. $telefono .'%3C/telefono%3E%3Cid%3E'. $id .'%3C/id%3E%3Ctipoid%3E'. $tipoId .
                    '%3C/tipoid%3E%3Cnacionalidad%3E'. $nacionalidad .'%3C/nacionalidad%3E%3Cedad%3E'. $edad .
                    '%3C/edad%3E%3Cemail%3E'. $email .'%3C/email%3E%3Cpassword%3E'. $password .'%3C/password%3E%3C/cliente%3E%3C/clientes%3E';
    
                    //Leemos el json de la API
                    $jsonData = file_get_contents($url);
    
                    //Decodificar el json en un array php
                    $cliente = json_decode($jsonData);
    
                    $cliente = $cliente[0];

                    session_start();
                    $_SESSION['idCliente'] = $cliente->idCliente;
                    $fechaInicio = $_SESSION["fechaInicio"];
                    $fechaFin = $_SESSION["fechaFin"];
                    $adultos = $_SESSION["adultos"];
                    $menores = $_SESSION["menores"];
                    $codigo = $_SESSION["codigo"];
                    $idHotel = $_SESSION["idHotel"];

                    $url = 'http://localhost:8080/apibd?comanda=reserva-addReserva&dades=%3Creservas%3E%3Creserva%3E%3CfechaInicio%3E'. $fechaInicio .
                    '%3C/fechaInicio%3E%3CfechaFin%3E'. $fechaFin .'%3C/fechaFin%3E%3Cadultos%3E'. $adultos .'%3C/adultos%3E%3Cmenores%3E'. $menores .
                    '%3C/menores%3E%3CidCliente%3E'. $cliente->idCliente .'%3C/idCliente%3E%3Ccodigo%3E'. $codigo .'%3C/codigo%3E%3CidHotel%3E'. $idHotel .'%3C/idHotel%3E%3C/reserva%3E%3C/reservas%3E';
                    
                    //Leemos el json de la API
                    $jsonData = file_get_contents($url);
                        
                    //Decodificar el json en un array php
                    $reserva = json_decode($jsonData);

                    $_SESSION = [];
                    $_SESSION['idCliente'] = $cliente->idCliente;
    
                    header("Location: /webservice/public/misreservas");
                } else {
                    $alertaR = "Todos los campos son obligatorios";
                }
            }
        }
    
    
        $router->render("cliente/index", [
          "titulo" => "Autenticacion",
          "alerta" => $alerta,
          "alertaR" => $alertaR
        ]);
    }

    public static function addCodigo(Router $router) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();
            $_SESSION['codigo'] = $_POST['codigo'];
            header("Location: /webservice/public/autenticacion");
        }
    }
}