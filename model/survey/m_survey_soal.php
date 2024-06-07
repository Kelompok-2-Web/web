<?php
class mSurveySoal
{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) values(?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('iiiss', $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['soal_nama']);

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

    public function getDataBySurveyId($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where survey_id = ? order by no_urut asc");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function getDataBySurveyIdKategori($id)
    {
        $query = $this->db->prepare("SELECT q.soal_id, q.survey_id, q.no_urut, q.soal_jenis, q.soal_nama , c.kategori_nama
                                    FROM {$this->table} q
                                    JOIN m_kategori c ON q.kategori_id = c.kategori_id
                                    WHERE q.survey_id = ?
                                    ORDER BY q.no_urut");

        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();

        // Initialize an array to hold the categorized questions
        $categorizedQuestions = [];

        // Process the result
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categoryName = $row['kategori_nama'];

                // Group questions by category
                if (!isset($categorizedQuestions[$categoryName])) {
                    $categorizedQuestions[$categoryName] = [];
                }
                $categorizedQuestions[$categoryName][] = [
                    'soal_id' => $row['soal_id'],
                    'survey_id' => $row['survey_id'],
                    'no_urut' => $row['no_urut'],
                    'soal_jenis' => $row['soal_jenis'],
                    'soal_nama' => $row['soal_nama']
                ];
            }
        }

        return $categorizedQuestions;
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set survey_id = ?, kategori_id = ?, no_urut = ?, soal_jenis = ?, soal_nama = ? where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('iiissi', $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['soal_nama'], $id);

        // eksekusi query
        $query->execute();

        // aksdda
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
