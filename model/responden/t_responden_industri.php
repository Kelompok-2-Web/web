<?php
class tRespondenIndustri
{
    public $db;
    protected $table = 't_responden_industri';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (survey_id, responden_tanggal, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota) values(?,?,?,?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('isssssss', $data['survey_id'], $data['responden_tanggal'], $data['responden_nama'], $data['responden_jabatan'], $data['responden_perusahaan'], $data['responden_email'], $data['responden_hp'], $data['responden_kota']);

        // eksekusi query untuk menyimpan ke database
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where responden_industri_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set survey_id = ?, responden_tanggal = ?, responden_nama = ?, responden_jabatan = ?, responden_perusahaan = ?, responden_email = ?, responden_hp = ?, responden_kota = ? where responden_industri_id = ?");

        // binding parameter ke query
        $query->bind_param('isssssssi', $data['survey_id'], $data['responden_tanggal'], $data['responden_nama'], $data['responden_jabatan'], $data['responden_perusahaan'], $data['responden_email'], $data['responden_hp'], $data['responden_kota'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where responden_industri_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}