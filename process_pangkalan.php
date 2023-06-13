<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CrudPangkalan
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }

    public function create($id, $sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('INSERT INTO tpangkalan (id, sub_penyalur,type_pangkalan,nama_pemilik,alamat,kota,desa,no_telp,kode_pos,username,password,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
        $query->execute([$id, $sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status]);
    }
    public function update($id, $sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('UPDATE tpangkalan SET sub_penyalur = ?,type_pangkalan = ?,nama_pemilik = ?,alamat = ?,kota = ? ,desa = ? ,no_telp = ?,kode_pos = ?,username = ? ,password = ?,status = ? WHERE id = ?');
        $query->execute([$sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status, $id]);
    }

    public function read()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT * FROM tpangkalan');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('DELETE FROM tpangkalan WHERE id = ?');
        $query->execute([$id]);
    }

    // Create User From data pangkalan
    public function createUser($id, $name, $username, $password, $type)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('INSERT INTO users (id, name,username,password,is_type) VALUES (?,?,?,?,?)');
        $query->execute([$id, $name, $username, $password, $type]);
    }
}

// Inisialisasi objek CRUD
$crud = new CrudPangkalan();

// Tangani aksi yang dikirim dari form
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'create') {
        $id = random_int(1, 10000);
        $sub_penyalur = $_POST['sub_penyalur'];
        $type_pangkalan = $_POST['type_pangkalan'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $desa = $_POST['desa'];
        $no_telp = $_POST['no_telp'];
        $kode_pos = $_POST['kode_pos'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $type = 1;
        $crud->create($id, $sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status);
        $crud->createUser($id, $nama_pemilik, $username, $password, $type);
        $_SESSION['success_message'] = "Data berhasil ditambahkan!";
    } elseif ($action == 'edit') {
        $id = $_POST['id'];
        $sub_penyalur = $_POST['sub_penyalur'];
        $type_pangkalan = $_POST['type_pangkalan'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $desa = $_POST['desa'];
        $no_telp = $_POST['no_telp'];
        $kode_pos = $_POST['kode_pos'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        // $type = 1;
        $crud->update($id, $sub_penyalur, $type_pangkalan, $nama_pemilik, $alamat, $kota, $desa, $no_telp, $kode_pos, $username, $password, $status);
        // $crud->createUser($id, $nama_pemilik, $username, $password, $type);
        $_SESSION['success_message'] = "Data berhasil diubah!";
    }
    header('Location: index.php?Page=data-pangkalan');
}

// Tangani aksi yang dikirim melalui URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $crud->delete($id);
    }
    $_SESSION['success_message'] = "Data berhasil dihapus!";
    header('Location: index.php?Page=data-pangkalan');
}
