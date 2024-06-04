<?php
class tJawabanDosen
{
    public $db;
    protected $table = 't_jawaban_dosen';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (responden_dosen_id, soal_id, jawaban) values(?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('iis', $data['responden_dosen_id'], $data['soal_id'], $data['jawaban']);

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
        $query = $this->db->prepare("select * from {$this->table} where jawaban_dosen_id = ?");

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
        $query = $this->db->prepare("update {$this->table} set responden_dosen_id = ?, soal_id = ?, jawaban = ? where jawaban_dosen_id = ?");

        // binding parameter ke query
        $query->bind_param('iisi', $data['responden_dosen_id'], $data['soal_id'], $data['jawaban'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where jawaban_dosen_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}
