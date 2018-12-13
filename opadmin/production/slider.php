<?php 
include 'header.php'; 
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no") {?>
                <b style="color:red;">İşlem Başarısız...</b>
              <?php }
              if ($_GET['sil']=="ok") {?>
                <b style="color:green;">Silme Başarılı...</b>
              <?php } elseif ($_GET['sil']=="no") {?>
                <b style="color:red;">Silme Başarısız...</b>
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
            <div align="right">
            <a href="slider-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
            </div>
          </div>
          <div class="x_content">
            <!-- Div İçerik Başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Slider Adı</th>
                  <th>Slider URL</th>
                  <th>Slider Sıra</th>
                  <th>Slider Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $say = 0;
                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                  <tr>
                    <td width="15px"><center><?php echo $say; ?></center></td>
                    <td><?php echo $slidercek['slider_resilyol']; ?></td>
                    <td><?php echo $slidercek['slider_ad']; ?></td>
                    <td><?php echo $slidercek['slider_url']; ?></td>
                    <td><?php echo $slidercek['slider_sira']; ?></td>
                    <td><?php 
                    if ($slidercek['slider_durum'] == 1) { ?>
                      <center><button class="btn btn-success btn-xs">Aktif</button></center>
                     <?php } else{ ?>
                      <center><button class="btn btn-danger btn-xs">Pasif</button></center>
                     <?php } ?>
                    </td>
                    <td><center><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                    <td><center><a href="../raffle/islem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                  </tr>
                <?php  }
                ?>
              </tbody>
            </table>
            <!-- Div İçerik Bitişi -->
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