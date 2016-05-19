<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */
$this->title = 'Phiếu mua #' . $model->so_pm;
$this->params['breadcrumbs'][] = ['label' => 'Phiếu mua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$ct_phieumua = \app\models\ChiTietPhieuMua::find()->where(['so_pm' => $model->so_pm])->with('taiSan')->all();
?>
<style type="text/css">
    .phieu-mua-ts-view {
        font-size: 15px;
    }

    .nguoi_giao_hang {
        text-transform: uppercase;
    }
    .chu_ky {
        text-align: center;
        font-weight: 700;
    }

    @media print {
        .tools, .breadcrumb {
            display: none;
        }

        .phieu-mua-ts-view, .phieu-mua-ts-view h2 {
            font-family: "time news roman" !important;
        }

        .phieu-mua-ts-view {
            font-size: 13px;
        }

        .phieu-mua-ts-view h2 {
            font-size: 21px;
        }

        #chi-tiet-phieu-mua {
            width: 90%;
        }
        .footer {
            display: none;
        }
    }
</style>

<div class="row tools">
    <div class="col-sm-12 text-right">
        <a href="javascript:window.print()" class="btn" style="color:red"><span class="glyphicon glyphicon-print"></span> In </a>
        <?= Html::a('<span class="glyphicon glyphicon-remove"></span>  Xóa', ['delete', 'id' => $model->so_pm], [
            'class' => 'btn',
            'style' => 'color:red',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],

        ]) ?>

        <a href="/phieu-mua-ts/create" class="btn" style="color:red"><span class="glyphicon glyphicon-plus"></span> Thêm mới</a>
        <br />
        <br />
    </div>
</div>


<div class="row tools" style="margin-bottom: 15px">
    <div class="col-sm-1">
        <a href="/phieu-mua-ts/view?id=<?= $prevId ?>" class="btn btn-primary">&lt; Phiếu trước</a>
    </div>
    <div class="col-sm-9 text-center">
        <b><?= $this->title ?></b>
           
    </div>
    <div class="col-sm-2 text-right">
        <?php if ($nextId > 0): ?>
            <a href="/phieu-mua-ts/view?id=<?= $nextId ?>" class="btn btn-primary">Phiếu tiếp theo &gt; </a>
        <?php else: ?>
            <a href="/phieu-mua-ts/create" class="btn btn-default" style="color:red" disabled>Phiếu tiếp theo &gt; </a>
        <?php endif; ?>
    </div>
</div>

<div class="phieu-mua-ts-view">


<div class="row">
  <div class="col-xs-3">
    Đơn vị: <b>Cty CPTM xxx</b><br />
    Kho: <?php echo $model->getMaKho()->one()->ten_kho; ?>

  </div>
  <div class="col-xs-4 col-xs-offset-5 text-center">
    <b>Mẫu số : 01 - VT</b> <br />
    Ban hành theo QĐ số 16/2006/QĐ-BTC ngày 20/03/2006 của bộ trưởng BTC)
  </div>
</div>
<div class="row">
    <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9 text-center">
        <h2>PHIẾU NHẬP TÀI SẢN</h2>
        <p>Ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></p>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
        <br />
        Số: <strong><?php echo $model->so_phieu ?></strong><br />
        Nợ: <strong>2111</strong><br />
        Có: <strong><?= $model->ma_tk_chinh ?></strong><br />
        
    </div>
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            Họ và tên: <i class="nguoi_giao_hang"><?= $model->getMaNvc()->one()->ten_kh ?></i><br />
            Địa chỉ: <i><?= $model->getMaKh()->one()->dia_chi ?></i><br />
            Theo hóa đơn số: <i class="so_hoa_don"><?= $model->so_hoa_son ?></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ngày phát hành hóa đơn:  <?= $model->ngay_phat_hanh_hd ?><br />
            Người giao hàng: <i><?= $model->getMaKh()->one()->ten_kh ?></i><br />
            Lý do: <i><?= $model->ly_do ?></i><br />
            Nhập tại kho: <i><?= $model->ma_kho ?> - <?= $model->getMaKho()->one()->ten_kho ?></i>
            <br />
            <br />
        </div>
    </div>
    <div class="row">
        <center>
            <table class="table table-bordered" id="chi-tiet-phieu-mua">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên, nhãn hiệu,quy cách, phẩm chất vật tư, sản phẩm</th>
                        <th>Mã số </th>
                        <th>SL</th>
                        <!-- <th>DVT</th> -->
                        <th>Ngày SD</th>
                        <th>Số năm khấu hao</th>
                        <th>Nguyên giá</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $i = 1;
                        $sum = 0;
                        foreach ($ct_phieumua as $key => $item) {
                            $sum += $item->taiSan->nguyen_gia * 1;
                            ?>

                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item->taiSan->ten_ts ?></td>
                                <td><?= $item->ma_ts ?></td>
                                <td>1</td>
                                <td><?= $model->ngay_su_dung ? $model->ngay_su_dung : $model->ngay_lap ?></td>
                                <td><?= $item->taiSan->so_nam_khau_hao ?></td>
                                <!--td><?= $item->taiSan->dvt ?></td-->
                                <td><?= @number_format($item->taiSan->nguyen_gia) ?> VND</td>
                                <!-- <td><?= $item->taiSan->ma_lts ?></td> -->
                            </tr>

                            <?php 
                        }

                        ?>
                </tbody>
                <tfoot>
                    <tr style="font-weight: 700">
                        <td></td>
                        <td>Cộng</td>
                        <td></td>
                        <td></td>
                        <!-- <td></td> -->
                        <td></td>
                        <td></td>
                        <td><?= @number_format($sum) ?> VND</td>
                    </tr>
                </tfoot>
            </table>
        </center>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            Thuế suất GTGT: <?= $model->thue_suat ?>%
        </div>
        <div class="col-xs-3 text-right">
            Tiền thuế GTGT:
        </div>
        <div class="col-xs-3 text-right">
            <?= @number_format($model->thue_suat * $sum / 100) ?> VND
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-6 text-right">
            <strong>Tổng cộng tiền thanh toán: </strong>
        </div>
        <div class="col-sm-3 text-right"><strong>
            <?= @number_format($sum + $model->thue_suat * $sum / 100) ?> VND </strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        Số tiền viết bằng chữ: <i style="text-transform: lowercase;"><?= money_string(intval($sum + $model->thue_suat * $sum / 100)) ?></i>
    </div>
    <br />
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
            Nhập, ngày ...... tháng ..... năm ......
            <br />
            <br />
            <br />
        </div>
    </div>
    <div class="row chu_ky">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            Thủ trưởng đơn vị
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            Người nhận
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            Người giao
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            Kế toán trưởng
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            Người lập phiếu
        </div>
    </div>


<div class="row tools">

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <p>

            
            <a href="javascript:window.print()" class="btn btn-primary">In </a>
            <?= Html::a('Cập nhật', ['update', 'id' => $model->so_pm], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Xóa', ['delete', 'id' => $model->so_pm], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],

            ]) ?>
        </p>
    </div>
</div>
<?php
// Dont care about me :(((
function money_string($number) {
    $hyphen      = ' ';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'âm ';
    $decimal     = ' phẩy ';
    $dictionary  = array(
        0                   => 'Không',
        1                   => 'Một',
        2                   => 'Hai',
        3                   => 'Ba',
        4                   => 'Bốn',
        5                   => 'Năm',
        6                   => 'Sáu',
        7                   => 'Bảy',
        8                   => 'Tám',
        9                   => 'Chín',
        10                  => 'Mười',
        11                  => 'Mười một',
        12                  => 'Mười hai',
        13                  => 'Mười ba',
        14                  => 'Mười bốn',
        15                  => 'Mười năm',
        16                  => 'Mười sáu',
        17                  => 'Mười bảy',
        18                  => 'Mười tám',
        19                  => 'Mười chín',
        20                  => 'Hai mươi',
        30                  => 'Ba mươi',
        40                  => 'Bốn mươi',
        50                  => 'Năm mươi',
        60                  => 'Sáu mươi',
        70                  => 'Bảy mươi',
        80                  => 'Tám mươi',
        90                  => 'Chín mươi',
        100                 => 'trăm',
        1000                => 'ngàn',
        1000000             => 'triệu',
        1000000000          => 'tỷ',
        1000000000000       => 'nghìn tỷ',
        1000000000000000    => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . money_string(abs($number));
    }

    $string = $fraction = null;
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
        break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
        break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . money_string($remainder);
            }
        break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = money_string($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= money_string($remainder);
            }
        break;
        }
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    return $string;
    }
?>