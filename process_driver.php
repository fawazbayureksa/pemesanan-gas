<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class CRUD
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }

    public function create($id, $name)
    {
        // Query untuk memasukkan data baru
        $query = $this->db->prepare('INSERT INTO tdriver (id, nama) VALUES (?, ?)');
        $query->execute([$id, $name]);
    }

    public function read()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT * FROM tdriver');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id, $name)
    {
        $query = $this->db->prepare('UPDATE tdriver SET nama = ? WHERE id = ?');
        $query->execute([$name, $id]);
    }
    public function delete($id)
    {
        // Query untuk menghapus data berdasarkan ID
        $query = $this->db->prepare('DELETE FROM tdriver WHERE id = ?');
        $query->execute([$id]);
    }
}

// Inisialisasi objek CRUD
$crud = new CRUD();

// Tangani aksi yang dikirim dari form
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'create') {
        $id = random_int(1, 10000);
        $name = $_POST['name'];
        $crud->create($id, $name);
        $_SESSION['success_message'] = "Data berhasil tambahkan!";
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $crud->update($id, $name);
        $_SESSION['success_message'] = "Data berhasil diubah!";
    }
    header('Location: index.php?Page=data-supir');
}

// Tangani aksi yang dikirim melalui URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $crud->delete($id);
    }
    $_SESSION['success_message'] = "Data berhasil dihapus!";
    header('Location: index.php?Page=data-supir');
}
