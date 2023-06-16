<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CrudDistribusi
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }

    public function create($id, $no_surat_jalan, $id_permintaan, $id_pangkalan, $nama_pemilik_pangkalan, $tgl_kirim, $id_mobil, $id_supir, $user_id)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('INSERT INTO tdistribusi (id,no_surat_jalan,id_permintaan,id_pangkalan,nama_pemilik_pangkalan,tgl_kirim,id_mobil,id_supir,user_id) VALUES (?,?,?,?,?,?,?,?,?)');
        $query->execute([$id, $no_surat_jalan, $id_permintaan, $id_pangkalan, $nama_pemilik_pangkalan, $tgl_kirim, $id_mobil, $id_supir, $user_id]);
    }

    public function read()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT * FROM tdistribusi');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readJoin()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT * FROM tdistribusi JOIN tmobil ON tdistribusi.id_mobil = tmobil.id JOIN tdriver ON tdistribusi.id_supir = tdriver.id JOIN tpermintaan ON tdistribusi.id_permintaan = tpermintaan.id ');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('DELETE FROM tdistribusi WHERE id = ?');
        $query->execute([$id]);
    }
    public function updatePermintaan($id, $status_permintaan)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('UPDATE tpermintaan SET status_permintaan = ? WHERE id = ?');
        $query->execute([$status_permintaan, $id]);
    }
}

// Inisialisasi objek CRUD
$crud = new CrudDistribusi();

// Tangani aksi yang dikirim dari form
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'create') {
        $id = random_int(1, 10000);
        $no_surat_jalan = $_POST['no_surat_jalan'];
        $id_permintaan = $_POST['id_permintaan'];
        $id_pangkalan = $_POST['id_pangkalan'];
        $nama_pemilik_pangkalan = $_POST['nama_pemilik_pangkalan'];
        $tgl_kirim = $_POST['tgl_kirim'];
        $id_mobil = $_POST['id_mobil'];
        $id_supir = $_POST['id_supir'];
        $user_id = $_POST['user_id'];
        $crud->create($id, $no_surat_jalan, $id_permintaan, $id_pangkalan, $nama_pemilik_pangkalan, $tgl_kirim, $id_mobil, $id_supir, $user_id);
        $crud->updatePermintaan($id_permintaan, 1);
        $_SESSION['success_message'] = "Data berhasil ditambahkan! $id, $no_surat_jalan, $id_permintaan, $id_pangkalan,$nama_pemilik_pangkalan, - $tgl_kirim, $id_mobil $id_supir, $user_id";
    }
    header('Location: index.php?Page=data-distribusi');
}

// Tangani aksi yang dikirim melalui URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $crud->delete($id);
    }
    $_SESSION['success_message'] = "Data berhasil dihapus!";
    header('Location: index.php?Page=data-distribusi');
}
