<?php include'header.php'; ?>

  <div class="content-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h4 class="panel-title">Tulis Pengumuman Baru</h4>
              <div class="heading-elements">
                <a href="pengumuman.php" class="btn btn-primary btn-sm"><i class="icon-arrow-left12"></i>Kembali</a>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <form action="pengumuman_act.php" method="post" enctype="multipart/form-data">
                  <table class="table">
                    <tr>
                      <th width="20%">Judul</th>
                      <td><input class="form-control" type="text" name="judul" required="required"></td>
                    </tr>
                    <tr>
                      <th>Isi Pengumuman</th>
                      <td><textarea style="min-height: 180px;resize: none" class="ckeditor" id="ckeditor" name="konten" required="required"></textarea></td>
                    </tr>
                    <tr>
                      <th></th>
                      <td>
                        <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'footer.php'; ?>