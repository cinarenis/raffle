<?php 
include'header.php';
$urunsor=$db->prepare("SELECT * FROM urun WHERE urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Düzenleme <small>
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
            <form action="../raffle/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori_id">Kategori Seç
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php  
                  $urun_id=$uruncek['kategori_id']; 
                  $kategorisor=$db->prepare("SELECT * FROM kategori WHERE kategori_ust=:kategori_ust ORDER BY kategori_sira");
                  $kategorisor->execute(array(
                    'kategori_ust' => 0
                  ));
                  ?>
                  <select class="select2_multiple form-control" required="" name="kategori_id" >
                   <?php 
                   while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
                     $kategori_id=$kategoricek['kategori_id'];
                     ?>
                     <option <?php if ($kategori_id==$urun_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>
                   <?php } ?>
                 </select>
               </div>
             </div>
             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_ad">Ürün Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="urun_ad" name="urun_ad" value="<?php echo $uruncek['urun_ad']; ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_detay">Ürün Detay 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="ckeditor" id="editor1" name="urun_detay"><?php echo $uruncek['urun_detay']; ?></textarea>
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
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_keyword">Ürün Keyword
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="urun_keyword" name="urun_keyword" value="<?php echo $uruncek['urun_keyword']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_kisi">Ürün Kişi Sayısı
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="urun_kisi" name="urun_kisi" value="<?php echo $uruncek['urun_kisi']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_durum">Ürün Durum <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="heard" class="form-control" name="urun_durum" required="required">
                  <option value="1" <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                  <option value="0" <?php if ($uruncek['urun_durum'] == 0) { echo 'selected=""'; } ?>>Pasif</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="urunduzenle" class="btn btn-success">Düzenle</button>
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