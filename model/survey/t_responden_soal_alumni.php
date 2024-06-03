<?php
class tRespondenAlumni
{
    public $db;
    protected $table = 't_responden_alumni';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (responden_alumni_id, survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus) values(?,?,GETDATE(),?,?,?,?,?,?)");

        $responId = $this->getMaxId();
        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('iisssssi', $responId, $data['survey_id'], $data['responden_nim'], $data['responden_prodi'], $data['responden_email'], $data['responden_hp'], $data['tahun_lulus']);

        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where soal_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function getMaxId()
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT IFNULL(MAX(responden_alumni_id), 0) + 1 AS responden_id_next FROM {$this->table}");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        //$query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // $result = $query->get_result();
        // $id = 1;
        // if ($result->num_rows > 0) {
        //     $row = $result->fetch_assoc();
        //     //return $row['responden_id_next'];
        //     $id = $row['responden_id_next'];
        // }
        // return $id;

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set survey_id = ?, kategori_id = ?, no_urut = ?, soal_jenis = ?, soal_nama = ? where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('iiissi', $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['soal_nama'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}
