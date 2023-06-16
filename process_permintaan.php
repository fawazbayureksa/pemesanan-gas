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
        $query = $this->db->prepare('INSERT INTO tpermintaan (id, tgl_permintaan,id_pangkalan,barang,harga,jumlah_permintaan,status_permintaan,jumlah_bayar) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute([$id, $tgl_permintaan, $id_pangkalan, $barang, $harga, $jumlah_permintaan, $status_permintaan, $jumlah_bayar]);
    }

    public function read()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT tpermintaan.id AS id_permintaan,tpermintaan.barang AS barang,tpangkalan.id AS id_pangkalan, tpangkalan.nama_pemilik as nama_pemilik_pangkalan, tpermintaan.harga AS harga, tpermintaan.jumlah_permintaan AS jumlah_permintaan,  tpermintaan.status_permintaan AS status_permintaan, tpermintaan.jumlah_bayar AS jumlah_bayar FROM tpermintaan JOIN tpangkalan ON tpermintaan.id_pangkalan = tpangkalan.id');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readSelf($id)
    {
        // Query untuk membaca semua data
        $query = $this->db->query("SELECT tpermintaan.id AS id_permintaan,tpermintaan.barang AS barang,tpangkalan.id AS id_pangkalan, tpangkalan.nama_pemilik as nama_pemilik_pangkalan, tpermintaan.harga AS harga, tpermintaan.jumlah_permintaan AS jumlah_permintaan,  tpermintaan.status_permintaan AS status_permintaan, tpermintaan.jumlah_bayar AS jumlah_bayar FROM tpermintaan JOIN tpangkalan ON tpermintaan.id_pangkalan = tpangkalan.id WHERE id_pangkalan ='$id' ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('DELETE FROM tpermintaan WHERE id = ?');
        $query->execute([$id]);
    }
    public function update($id, $status_permintaan)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('UPDATE tpermintaan SET status_permintaan = ? WHERE id = ?');
        $query->execute([$status_permintaan, $id]);
    }
}

// Inisialisasi objek CRUD
$crud = new CrudPermintaan();

// Tangani aksi yang dikirim dari form
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'create') {
        $id = random_int(1, 10000);
        $tgl_permintaan = $_POST['tgl_permintaan'];
        $id_pangkalan = $_POST['id_pangkalan'];
        $barang = $_POST['barang'];
        $harga = $_POST['harga'];
        $jumlah_permintaan = $_POST['jumlah_permintaan'];
        $status_permintaan = '0';
        $jumlah_bayar = (int) $jumlah_permintaan * (int) $harga;
        $crud->create($id, $tgl_permintaan, $id_pangkalan, $barang, $harga, $jumlah_permintaan, $status_permintaan, $jumlah_bayar);
        $_SESSION['success_message'] = "Permintaan berhasil ditambahkan!";
    }
    header('Location: index.php?Page=data-permintaan');
}

// Tangani aksi yang dikirim melalui URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $crud->delete($id);
        $_SESSION['success_message'] = "Permintaan berhasil dihapus!";
    } elseif ($action == 'konfirmasi' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $status_permintaan = 1;
        $crud->update($id, $status_permintaan);
        $_SESSION['success_message'] = "Permintaan berhasil dikonfirmasi!";
    } elseif ($action == 'done' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $status_permintaan = 2;
        $crud->update($id, $status_permintaan);
        $_SESSION['success_message'] = "Permintaan berhasil diselesaikan $id!";
    } elseif ($action == 'cancel' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $status_permintaan = 3;
        $crud->update($id, $status_permintaan);
        $_SESSION['success_message'] = "Permintaan berhasil dibatalkan !";
    }
    header('Location: index.php?Page=data-permintaan');
}
