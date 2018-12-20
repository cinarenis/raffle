<?php 
include 'header.php'; 
$kategorisor=$db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
$kategorisor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Listeleme <small>
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
            <a href="kategori-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
            </div>
          </div>
          <div class="x_content">
            <!-- Div İçerik Başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Kategori Adı</th>
                  <th>Kategori Sıra</th>
                  <th>Üst Kategori</th>
                  <th>Kategori Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $say = 0;
                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                  <tr>
                    <td width="15px"><center><?php echo $say; ?></center></td>
                    <td><?php echo $kategoricek['kategori_ad']; ?></td>
                    <td><?php echo $kategoricek['kategori_sira']; ?></td>
                    <td><?php echo $kategoricek['kategori_ust']; ?></td>
                    <td  width="15px"><?php 
                    if ($kategoricek['kategori_durum'] == 1) { ?>
                      <center><button class="btn btn-success btn-xs">Aktif</button></center>
                     <?php } else{ ?>
                      <center><button class="btn btn-danger btn-xs">Pasif</button></center>
                     <?php } ?>
                    </td>
                    <td width="15px"><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                    <td width="15px"><center><a href="../raffle/islem.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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