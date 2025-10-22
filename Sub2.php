<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require_once "app/routes.php";

<?php
require_once "controllers/ReservaController.php";

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'crear_reserva':
        $controller = new ReservaController();
        $controller->guardar();
        break;
    default:
        echo json_encode(["error" => "Ruta no encontrada"]);
}

<?php
require_once "app/models/Reserva.php";
require_once "app/models/Pasajero.php";

class ReservaController {

    public function guardar() {
        $data = json_decode(file_get_contents("php://input"), true);

        $idAccount = $data['idAccount'];
        $pasajeros = $data['pasajeros'];

        $reservaModel = new Reserva();
        $pasajeroModel = new Pasajero();

        $idReserva = $reservaModel->crearReserva($idAccount);

        foreach ($pasajeros as $p) {
            $idPasajero = $pasajeroModel->crearPasajero($p['nombre'], $p['documento'], $p['edad']);
            $reservaModel->asociarPasajero($idReserva, $idPasajero);
        }

        echo json_encode([
            "message" => "Reserva creada con éxito",
            "idReserva" => $idReserva
        ]);
    }
}

<?php
class Conexion {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "agencia_vuelos");
        if ($this->conn->connect_error) {
            die(json_encode(["error" => "Error de conexión"]));
        }
    }
}


<?php
require_once "Conexion.php";

class Reserva extends Conexion {

    public function crearReserva($idAccount) {
        $sql = "INSERT INTO reservas (FechaReserva, IdAccount) VALUES (NOW(), ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idAccount);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    public function asociarPasajero($idReserva, $idPasajero) {
        $sql = "INSERT INTO reserva_pasajeros (IdReserva, IdPasajero) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $idReserva, $idPasajero);
        $stmt->execute();
        $stmt->close();
    }
}



<?php
require_once "Conexion.php";

class Pasajero extends Conexion {

    public function crearPasajero($nombre, $documento, $edad) {
        $sql = "INSERT INTO pasajeros (Nombre, Documento, Edad) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $documento, $edad);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }
}

