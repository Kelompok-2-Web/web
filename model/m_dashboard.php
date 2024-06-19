<?php
class mDashboard
{
    public $db;

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function jumlahRespondenDosen()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_dosen");
    }

    public function jumlahRespondenMahasiswa()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_mahasiswa");
    }

    public function jumlahRespondenAlumni()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_alumni");
    }

    public function jumlahRespondenOrtu()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_ortu");
    }

    public function jumlahRespondenTendik()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_tendik");
    }

    public function jumlahRespondenIndustri()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select COUNT(*) as jumlah from t_responden_industri");
    }
}
