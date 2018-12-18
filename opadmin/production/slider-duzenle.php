<?php 
include'header.php';
$slidersor=$db->prepare("SELECT * FROM slider WHERE slider_id=:id");
$slidersor->execute(array(
  'id' => $_GET['slider_id']
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Düzenleme <small>
              <?php 
              if ($_GET['durum']=="ok") { ?>
                <b style="color:green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no") { ?>
                <b style="color:red;">İşlem Başarısız...</b>
              <?php }
              ?>
            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../raffle/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_resimyol">Slider Resim
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php 
                  if (strlen($slidercek['slider_resimyol'])>0) {?>
                    <img width="200"  src="../../<?php echo $slidercek['slider_resimyol']; ?>">
                  <?php } else {?>
                    <img width="200"  src="../../images/logo-yok.png">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_resimyol">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="slider_resimyol"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">
              <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="sliderresimduzenle" class="btn btn-success">Güncelle</button>
              </div>
            </form>
            <form action="../raffle/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_adi">Slider Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="slider_adi" name="slider_ad" value="<?php echo $slidercek['slider_ad']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               <!-- Ck Editör Başlangıç --> 
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_aciklama">Slider Açıklama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="slider_aciklama"><?php echo $slidercek['slider_aciklama'] ?></textarea>
                </div>
              </div>
              <script type="text/javascript">
                CKEDITOR.replace('editor1',
                {
                  filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                  forcePasteAsPlainText : true
                });
              </script>
              <!-- CK Editör Bitiş -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_link">Slider URL
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="slider_link" name="slider_link" disabled value="<?php echo $slidercek['slider_link']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_sira">Slider Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="slider_sira" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_durum">Slider Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control" name="slider_durum" required="required">
                    <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                    <option value="0" <?php if ($slidercek['slider_durum'] == 0) { echo 'selected=""'; } ?>>Pasif</option>
                  </select>
                </div>
              </div>
              <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="sliderduzenle" class="btn btn-success">Güncelle</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php 
include 'footer.php';
?>