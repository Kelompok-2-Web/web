<?php
include_once 'model/survey/m_kategori.php';

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : ""
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                <a href="?pages=kategori&act=tambah" class="btn btn-sm btn-primary">Tambah Kategori</a>
            </div>
        </div>
        <div class="card-body">

            <?php
            $act = (isset($_GET['act'])) ? $_GET['act'] : '';

            if ($act == 'tambah') {
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah User</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <form action="?pages=kategori/kategori_action.php&act=simpan" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input required type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=kategori" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } else if ($act == 'edit') { ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kategori</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">

                        <?php
                        $id = $_GET['id'];

                        $bank_soal = new mKategori();
                        $data = $bank_soal->getDataById($id)->fetch_assoc();
                        ?>

                        <form action="?pages=kategori/kategori_action.php&act=edit&id=<?= $id ?>" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input required type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=kategori" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } else { ?>

                <?php
                if ($status == 'sukses') {
                    echo '<div class="alert alert-success">
                      ' . $message . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                }
                ?>

                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Id</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bank = new mKategori();
                        if (isset($_GET['kategori_id'])) {
                            $list = $bank->getDataById($_GET['kategori_id']);
                        } else {
                            $list = $bank->getData();
                        }

                        $i = 1;
                        while ($row = $list->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['kategori_id'] ?></td>
                                <td><?= $row['kategori_nama'] ?></td>
                                <td>
                                    <a title="Edit Data" href="?pages=kategori&act=edit&id=<?= $row['kategori_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=kategori/kategori_action.php&act=hapus&id=<?= $row['kategori_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>

<!-- jQuery Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_id.min.js"></script>

<script>
  $(document).ready(function() {});
</script>