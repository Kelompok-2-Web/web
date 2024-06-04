<?php
include_once 'model/m_user_model.php';
// ubah dari saya
$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : ""
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Survey</li>
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
                <a href="?pages=pengguna&act=tambah" class="btn btn-sm btn-primary">Tambah User</a>
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
                        <form action="?pages=pengguna/pengguna_action.php&act=simpan" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=pengguna" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } else if ($act == 'edit') { ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Pengguna</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">

                        <?php
                        $id = $_GET['id'];

                        $bank_soal = new User();
                        $data = $bank_soal->getDataById($id);

                        $data = $data->fetch_assoc();
                        ?>

                        <form action="?pages=pengguna/pengguna_action.php&act=edit&id=<?= $id ?>" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="*hanya diisi jika hendak mengubah password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=pengguna" class="btn btn-warning">Kembali</a>
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
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bank = new User();
                        if (isset($_GET['user_id'])) {
                            $list = $bank->getDataById($_GET['user_id']);
                        } else {
                            $list = $bank->getData();
                        }

                        $i = 1;
                        while ($row = $list->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <a title="Edit Data" href="?pages=pengguna&act=edit&id=<?= $row['user_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=pengguna/penguna_action.php&act=hapus&id=<?= $row['user_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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