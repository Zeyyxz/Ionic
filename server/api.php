<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once "config.php";

function getInput() {
    return json_decode(file_get_contents("php://input"), true);
}


    $method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT * FROM users WHERE id = $id");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        }
        break;

    case 'POST':
        $input = getInput();
        $name = $conn->real_escape_string($input['nama'] ?? '');
        $email = $conn->real_escape_string($input['email'] ?? '');

        if ($name && $email) {
            $conn->query("INSERT INTO users (nama, email) VALUES ('$name', '$email')");
            echo json_encode(["message" => "Data berhasil ditambahkan"]);
        } else {
            echo json_encode(["error" => "Nama dan email wajib diisi"]);
        }
        break;

    case 'PUT':
        if (!isset($_GET['id'])) {
            echo json_encode(["error" => "ID wajib disertakan"]);
            break;
        }

        $id = intval($_GET['id']);
        $input = getInput();
        $name = $conn->real_escape_string($input['nama'] ?? '');
        $email = $conn->real_escape_string($input['email'] ?? '');

        $conn->query("UPDATE users SET nama='$name', email='$email' WHERE id=$id");
        echo json_encode(["message" => "Data berhasil diupdate"]);
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            echo json_encode(["error" => "ID wajib disertakan"]);
            break;
        }

        $id = intval($_GET['id']);
        $conn->query("DELETE FROM users WHERE id=$id");
        echo json_encode(["message" => "Data berhasil dihapus"]);
        break;

          default:
        echo json_encode(["error" => "Metode tidak didukung"]);
        break;}

        if (isset($_POST['username']) && isset($_POST['password'])) {
        global $conn;
        $data = "SELECT * FROM tb_login";
        $query = mysqli_query($conn, $data);

        while ($baris = mysqli_fetch_assoc($query)) {
            $username = $_POST['username'];
            $password = $_POST['password'];

        if ($username === $baris['username'] && $password === $baris['password']) {
            echo json_encode([
                "status" => "Berhasil",
                "pesan" => "Berhasil Login !"
            ]);
                exit;
        }
    }
    echo json_encode([
        "status" => "Gagal",
        "pesan" => "Gagal Login!"
    ]);
    exit;
}
?>