<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class ReadOption
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }
    public function readDriver()
    {
        $query = $this->db->query('SELECT * FROM tdriver');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readKendaraan()
    {
        $query = $this->db->query('SELECT * FROM tmobil');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readPermintaan()
    {
        // Query untuk membaca semua data
        $query = $this->db->query('SELECT tpermintaan.id AS id_permintaan,tpermintaan.barang AS barang,tpangkalan.id AS id_pangkalan, tpangkalan.nama_pemilik as nama_pemilik_pangkalan FROM tpermintaan JOIN tpangkalan ON tpermintaan.id_pangkalan = tpangkalan.id WHERE status_permintaan = 0 OR status_permintaan = 1');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
