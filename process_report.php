<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class Report
{
    private $db; // Koneksi ke database

    public function __construct()
    {
        // Inisialisasi koneksi database
        $this->db = new PDO('mysql:host=localhost;dbname=db_gas', 'root', '');
    }
    public function read()
    {
        $query = $this->db->query('SELECT * FROM tdistribusi INNER JOIN tpangkalan ON tdistribusi.id_pangkalan = tpangkalan.id JOIN tpermintaan ON tdistribusi.id_permintaan = tpermintaan.id  WHERE status_permintaan = 2');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readRange($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->query("SELECT * FROM tdistribusi INNER JOIN tpangkalan ON tdistribusi.id_pangkalan = tpangkalan.id JOIN tpermintaan ON tdistribusi.id_permintaan = tpermintaan.id  WHERE status_permintaan = 2 AND tgl_kirim  BETWEEN '$tgl_awal' AND '$tgl_akhir' ");
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
        $query = $this->db->query('SELECT tpermintaan.id AS id_permintaan,tpermintaan.barang AS barang,tpangkalan.id AS id_pangkalan, tpangkalan.nama_pemilik as nama_pemilik_pangkalan FROM tpermintaan JOIN tpangkalan ON tpermintaan.id_pangkalan = tpangkalan.id WHERE status_permintaan = 0');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
