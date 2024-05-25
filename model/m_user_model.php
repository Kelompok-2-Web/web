<?php
class User
{
    public $db;
    protected $table = 'm_user';
    private $salt = "budionoTukangBatu";

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $data['password'] = password_hash($data['password'] . $this->salt, PASSWORD_BCRYPT);
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (username, nama, password) values(?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('sss', $data['username'], $data['nama'], $data['password']);

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
        $query = $this->db->prepare("select * from {$this->table} where user_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function getDataByUsername($username)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where username = ?");

        // binding parameter ke query "s" berarti string. Biar tidak kena SQL Injection
        $query->bind_param('s', $username);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        if (empty($data['password'])) {
            $query = $this->db->prepare("update {$this->table} set username = ?, nama = ? where user_id = ?");
            
            // binding parameter ke query
            $query->bind_param('ssi', $data['username'], $data['nama'], $id);
        } else {
            $query = $this->db->prepare("update {$this->table} set username = ?, nama = ?, password = ? where user_id = ?");
            $data['password'] = password_hash($data['password'] . $this->salt, PASSWORD_BCRYPT);
            
            // binding parameter ke query
            $query->bind_param('sssi', $data['username'], $data['nama'], $data['password'], $id);
        }


        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where user_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }

    /**
     * Cara menggunakan fungsi ini, cukup masukkan username dan password dari user.
     * @param string $username username user.
     * @param string $password password user.
     * 
     * Lalu, jika ingin mengecek hasil, perhatikan return value berikut
     * @return null|false|array Jika null, maka data tidak ditemukan(user belum terdaftar),
     *                          
     *                          Jika false, maka password salah(arahkan ke login lagi),
     *                          
     *                          Jika benar, maka akan mendapatkan array_key dari tabel m_user. cara akses cukup pakai ['<nama kolom>'].
     */
    public function loginUser($username, $password)
    {
        //query select username
        $query = $this->db->prepare("select * from {$this->table} where username = ?");

        $query->bind_param("s", $username);
        $query->execute();

        $result = $query->get_result();

        // if (!$result) {
        //     return null; // Return null if there is an issue with executing the query
        // }

        // Fetch the row from the result set
        $row = $result->fetch_assoc();

        // If no row is found, return false
        if ($row === null) {
            return null;
        }

        if (password_verify($password . $this->salt, $row['password'])) {
            unset($row['password']);
            return $row;
        }

        return false;
    }
}
