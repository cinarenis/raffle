<?php 
include'header.php'; 
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Admin Panel <small>Panele Hoşgeldiniz <?php 
              if ($_GET['durum']=="loginbasarili") {?>
                <b style="color:green;">Login Başarılı...</b>
              <?php }?></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            Sitenizin içeriğini yandaki menüler aracılığıyla yönetebilirsiniz.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php 
include('footer.php');
?>