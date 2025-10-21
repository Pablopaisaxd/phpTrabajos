<?php
class Database {
    private $host = "localhost";
    private $db_name = "mvc_demo";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", 
                                   $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>

<?php
require_once "../config/Database.php";
require_once "../models/User.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        $stmt = $user->readAll();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $user->nombre = $data->nombre;
        $user->email = $data->email;
        if ($user->create()) {
            echo json_encode(["message" => "Usuario creado"]);
        } else {
            echo json_encode(["message" => "Error al crear"]);
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        if ($user->delete($data->id)) {
            echo json_encode(["message" => "Usuario eliminado"]);
        } else {
            echo json_encode(["message" => "Error al eliminar"]);
        }
        break;
}
?>

.htaccesss
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
