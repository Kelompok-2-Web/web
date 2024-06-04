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

    <?php echo $_GET['sub_menu']; ?> 

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