<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data yang dikirim melalui AJAX
    $akunValue = $_POST["akun"];
    $akunBaruValue = $_POST["akun_baru"];
    $idKlasifikasi = $_POST["id_klasifikasi"];
    $idUsaha = $_POST["id_usaha"];

    // Lakukan validasi data (sesuaikan dengan kebutuhan Anda)

    // Buat koneksi ke database
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "gb2";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Simpan data ke dalam tabel akun
    $sql = "INSERT INTO akun (id_klasifikasi, id_usaha, akun) VALUES ('$idKlasifikasi', '$idUsaha', '$akunBaruValue')";

    if ($conn->query($sql) === true) {
        // Kirim respons berisi ID akun yang baru saja dibuat
        $response = ["id_akun" => $conn->insert_id];
        echo json_encode($response);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
