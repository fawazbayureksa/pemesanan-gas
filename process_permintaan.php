<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CrudPermintaan
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }

    public function create($id, $tgl_permintaan, $id_pangkalan, $barang, $harga, $jumlah_permintaan, $status_permintaan, $jumlah_bayar)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('INSERT INTO tpermintaan (id, tgl_permintaan,id_pangkalan,barang,harga,jumlah_permintaan,status_permintaan,jumlah_bayar) VALUES (?, ?,?,?,?,?,?,?)');
        $query->execute([$id, $tgl_permintaan, $id_pangkalan, $barang, $harga, $jumlah_permintaan, $status_permintaan, $jumlah_bayar]);
    }

    public function read()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT * FROM tpermintaan');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('DELETE FROM tpermintaan WHERE id = ?');
        $query->execute([$id]);
    }
    public function update($id, $no_kendaraan)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('UPDATE tmobil SET no_kendaraan = ? WHERE id = ?');
        $query->execute([$no_kendaraan, $id]);
    }
}

// Inisialisasi objek CRUD
$crud = new CrudPermintaan();

// Tangani aksi yang dikirim dari form
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'create') {
        $id = random_int(1, 10000);
        $name = $_POST['no_kendaraan'];
        $crud->create($id, $tgl_permintaan, $id_pangkalan, $barang, $harga, $jumlah_permintaan, $status_permintaan, $jumlah_bayar);
        $_SESSION['success_message'] = "Data berhasil ditambahkan!";
    } elseif ($action == 'edit') {
        $id = $_POST['id'];
        $no_kendaraan = $_POST['no_kendaraan'];
        $crud->update($id, $no_kendaraan);
        $_SESSION['success_message'] = "Data berhasil dikonfirmasi!";
    }
    header('Location: index.php?Page=data-kendaraan');
}

// Tangani aksi yang dikirim melalui URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $crud->delete($id);
    }
    $_SESSION['success_message'] = "Data berhasil dihapus!";
    header('Location: index.php?Page=data-kendaraan');
}
