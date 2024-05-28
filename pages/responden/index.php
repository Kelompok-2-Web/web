<?php
include_once 'model/survey/m_survey_soal.php';
include_once 'model/survey/m_survey.php';
include_once 'model/survey/m_kategori.php';

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Soal Survey</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Soal Survey</li>
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
        <a href="?pages=soal&act=tambah" class="btn btn-sm btn-primary">Tambah Soal</a>
      </div>
    </div>
    <div class="card-body">

    <?php echo $_GET['tipe']; ?> 

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>


  <script>
    $(document).ready(function() {
      // $('#form-tambah').validate({
      //   rules: {
      //     kode_soal: {
      //       required: true,
      //       minlength: 3,
      //       maxlength: 10
      //     },
      //     nama_soal: {
      //       required: true,
      //       minlength: 5,
      //       maxlength: 255
      //     }
      //   },
      //   errorElement: 'span',
      //   errorPlacement: function(error, element) {
      //     error.addClass('invalid-feedback');
      //     element.closest('.form-group').append(error);
      //   },
      //   highlight: function(element, errorClass, validClass) {
      //     $(element).addClass('is-invalid');
      //   },
      //   unhighlight: function(element, errorClass, validClass) {
      //     $(element).removeClass('is-invalid');
      //   }
      // });
    });
  </script>
</section>