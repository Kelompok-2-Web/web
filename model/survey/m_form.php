<?php
class mForm
{
    public $db;
    protected $table = 'm_survey';

    public function __construct()
    {   
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function getData($role)
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select survey_id, survey_nama, survey_deskripsi, survey_tanggal from {$this->table} where survey_jenis LIKE '$role'");
    }
}
