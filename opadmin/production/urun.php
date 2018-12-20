<?php 
include 'header.php'; 
$urunsor=$db->prepare("SELECT * FROM urun ORDER BY urun_id DESC");
$urunsor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>
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
            <a href="urun-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
            </div>
          </div>
          <div class="x_content">
            <!-- Div İçerik Başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ürün Adı</th>
                  <th>Ürün Fiyat</th>
                  <th>Çekilişe Kalan Kişi</th>
                  <th>Ürün Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $say = 0;
                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                  <tr>
                    <td width="15px"><center><?php echo $say; ?></center></td>
                    <td><?php echo $uruncek['urun_ad']; ?></td>
                    <td align="center" width="25px"><?php echo $uruncek['urun_fiyat']; ?></td>
                    <td align="center" width="25px"><?php echo $uruncek['urun_kalankisi']; ?></td>
                    <td width="25px"><?php 
                    if ($uruncek['urun_durum'] == 1) { ?>
                      <center><button class="btn btn-success btn-xs">Aktif</button></center>
                     <?php } else{ ?>
                      <center><button class="btn btn-danger btn-xs">Pasif</button></center>
                     <?php } ?>
                    </td>
                    <td width="25px"><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                    <td width="25px"><center><a href="../raffle/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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