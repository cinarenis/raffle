<?php 
include 'header.php'; 
$kullanicisor=$db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Listeleme <small>
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
          </div>
          <div class="x_content">
            <!-- Div İçerik Başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ad Soyad</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th>Kayıt Tarih</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $say = 0;
                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                  <tr>
                    <td width="15px"><center><?php echo $say; ?></center></td>
                    <td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
                    <td><?php echo $kullanicicek['kullanici_mail']; ?></td>
                    <td><?php echo $kullanicicek['kullanici_tel']; ?></td>
                    <td width="25px"><?php echo $kullanicicek['kullanici_zaman']; ?></td>
                    <td width="25px"><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                    <td width="25px"><center><a href="../raffle/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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