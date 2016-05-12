<?php

/* @var $this yii\web\View */

$this->title = 'HTTT Kế toán';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hệ thống kế toán</h1>

        <div id="overview-chart"></div>

        <!-- <p><a class="btn btn-lg btn-success" href=""></a></p> -->
    </div>

    <?php

      if (!Yii::$app->user->isGuest):

     ?>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Quản lý</h2>

                <a href="/khach-hang">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Quản lý khách hàng</strong>
                  </div>
                </a>

                <a href="/kho">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Quản lý kho</strong>
                  </div>
                </a>

                <a href="/loai-tai-san">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Loại tài sản</strong>
                  </div>
                </a>


                <a href="/tai-san">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Quản lý tài sản</strong>
                  </div>
                </a>

                <a href="/phieu-mua-ts">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Phiếu mua tài sản</strong>
                  </div>
                </a>

                <a href="/phieu-ban-ts">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Phiếu bán tài sản</strong>
                  </div>
                </a>

            </div>

            <div class="col-lg-4">
                <h2>Tác vụ</h2>

                <a href="/phieu-mua-ts/create">
                  <div class="alert alert-dismissible alert-danger">
                    <strong>Lập phiếu mua TS</strong>
                  </div>
                </a>

                <a href="/phieu-ban-ts/create">
                  <div class="alert alert-dismissible alert-danger">
                    <strong>Lập phiếu bán TS</strong>
                  </div>
                </a>


            </div>
            <div class="col-lg-4">
                <h2>Thiết lập</h2>

                <a href="/">
                  <div class="alert alert-dismissible alert-success">
                    <strong>Thông tin cá nhân</strong>
                  </div>
                </a>

                <a href="/site/logout">
                  <div class="alert alert-dismissible alert-success">
                    <strong><?= Yii::$app->user->identity->username ?> (Đăng xuất)</strong>
                  </div>
                </a>
            </div>
        </div>

    </div>

  <?php else: ?>

    <center>

      <a class="btn btn-primary btn-lg" href="/site/login">Đăng nhập</a>

    </center>

  <?php endif; ?>
</div>
