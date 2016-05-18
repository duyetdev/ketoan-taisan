<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */
/* @var $form yii\widgets\ActiveForm */

$khachhang = \app\models\KhachHang::find()->asArray()->all();
$tai_khoan = \app\models\TaiKhoan::find()->asArray()->all();
$kho = \app\models\Kho::find()->asArray()->all();
$loai_ts_model = \app\models\LoaiTaiSan::find()->asArray()->all();
$loai_ts = [];
foreach ($loai_ts_model as $loat_t) {
  $loai_ts[$loat_t['ma_lts']] = $loat_t['ten_loai'];
}

$errors = $model->getErrors();
// print_r($errors);die;
$last_id = \app\models\PhieuMuaTs::lastId() + 1;
$maphieu = 'NTSA' . str_pad($last_id, 5, '0', STR_PAD_LEFT) . '-' . date('m-y');

$this->registerJsFile('js/phieu-mua-ts.js', ['position' => \yii\web\View::PH_BODY_END]);

?>

<script type="text/javascript">
  var khachhang = <?= json_encode($khachhang); ?>;
  var kho = <?= json_encode($kho); ?>;

</script>

<div class="phieu-mua-ts-form">

<?php if ($errors): ?>
  <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger">
          <?php foreach ($errors as $value) {
            echo $value[0] . ' <br />';
          } ?>
        </div>
      </div>
  </div>
<?php endif; ?>

      <?php $form = ActiveForm::begin([
          'layout' => 'horizontal',
          'fieldConfig' => [
              'horizontalCssClasses' => [
                  'label' => 'col-sm-4',
                  'offset' => 'col-sm-offset-2',
                  'wrapper' => 'col-sm-7',
                  'error' => '',
                  'hint' => '',
              ],
          ],
      ]); ?>

<div class="row">
  <div class="col-md-2">
    Đơn vị: <i>Cty CPTM xxx</i><br />
    Kho: <i id="kho"></i>

  </div>
  <div class="col-md-4 col-md-offset-6 text-right">
    <?= $form->field($model, 'so_phieu')->textInput() ?>
  </div>
</div>

  <div class="row text-center">
    <h1>Phiếu mua tài sản</h1>
    <p>
      <i>Ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></i>
    </p>
  </div>

  <div class="row">
      <div class="col-md-6">



          <div class="form-group">
            <label class="control-label col-sm-4">Nhà cung cấp:</label>

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_kh',
              ArrayHelper::map($khachhang, 'ma_kh', function($i) { return $i['ten_kh'] . ' - Mã NCC: ' . $i['ma_kh']; }),
              ['class' => 'form-control ncc']); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Địa chỉ:</label>

            <div class="col-sm-4">
              <i id="address"></i>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Người giao hàng:</label>

            <input type="hidden" name="chi-tiet-phieu-mua" value="">

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_nvc',
              ArrayHelper::map($khachhang, 'ma_kh', function($i) { return $i['ten_kh'] . ' - Mã KH: ' . $i['ma_kh']; }),
              ['class' => 'form-control ma_nvc']); ?>
            </div>
          </div>





          

          <div class="form-group">
            <label class="control-label col-sm-4">Số hóa đơn:</label>

            <div class="col-sm-4">
              <?= Html::activeTextInput($model, 'so_hoa_son', ['class'=> 'form-control']); ?>
            </div>
            <div class="col-sm-3">
              <?= Html::activeTextInput($model, 'ngay_phat_hanh_hd', ['class'=> 'form-control']); ?>
            </div>
          </div>


          <?= $form->field($model, 'ly_do')->textArea(['label' => '']) ?>

      </div>
      <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-sm-4">Kho</label>

              <div class="col-sm-7">
                <?= Html::activeDropDownList($model, 'ma_kho',
                  ArrayHelper::map($kho, 'ma_kho', 'ten_kho'),
                  ['class' => 'form-control']); ?>
              </div>
            </div>

          <?= $form->field($model, 'ngay_phat_hanh_hd')->textInput() ?>


          <?= $form->field($model, 'loai_hoa_don')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'thue_suat')->textInput() ?>

            <div class="form-group">
            <label class="control-label col-sm-4">TK</label>

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_tk_chinh',
                ArrayHelper::map($tai_khoan, 'ma_tk', function($i) { return $i['ma_tk'] . ' - ' . $i['ten_tk']; }),
                ['class' => 'form-control']); ?>
            </div>
          </div>
      </div>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover" id="chi-tiet-phieu-mua">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên, nhãn hiệu,quy cách, phẩm chất vật tư, sản phẩm</th>
                <th>Mã số </th>
                <th>SL</th>
                <th>DVT</th>
                <th>Ngày SD</th>
                <th>Số năm khấu hao</th>
                <th>Nguyên giá</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td>1</td>
                <td>2</td>
                <td>4</td>
                <td>5</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>7</td>
              </tr> -->
            </tbody>
            <tfoot>
              <tr>
                <td colspan="8" class="text-center table-add-row" data-toggle="modal" data-target="#form-chitiet">
                  +add
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <div class="row text-center">
        <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="/js/jquery.price_format.2.0.min.js"></script>

<script type="text/javascript">
    window.t = $('#chi-tiet-phieu-mua').DataTable();

    jQuery(document).ready(function($) {
      
      $('#nguyen_gia').priceFormat({
          prefix: '',
          centsSeparator: ',',
          thousandsSeparator: '.',
          centsLimit: 0,
          clearPrefix: true,
          suffix: ' VND'
      });

    });

    // $(document).ready(function() {
    // $('#chi-tiet-phieu-mua').on('page.dt', function() {
    //   alert(window.t.rows().data())
    // }); 
    // }); 

    function updateFormData() {
      var x = window.t.rows().data()
      var data = []

      for (var i = 0; i < x.length; ++i)
        data[i] = x[i];

      $('[name=chi-tiet-phieu-mua]').val(JSON.stringify(data));
    }


    function add() {
      var data = [0];
      var ok = false;
      $('#chitiet-form input, #chitiet-form select').each(function(i, e) {
        data[i] = $(e).val();
        // $(e).val('');
        if (data[i].length > 0) ok = true;
      });

      if (!ok) return alert('Error, please try again!');
      window.t.row.add(data).draw(true);
      $('#form-chitiet').modal('hide');
      updateFormData();
    };

    $('#address').text(khachhang[0].dia_chi);
    $('.ncc').on('change', function(e) {
      var id = $(this).val();
      var dc = '';
      for (var i in khachhang) {
        if (khachhang[i].ma_kh == id) {
          $('#address').text(khachhang[i].dia_chi);
        }
      }
    });

    $('#kho').text(kho[0].ten_kho);
    $('#phieumuats-ma_kho').on('change', function(e) {
      var id = $(this).val();
      var dc = '';
      for (var i in kho) {
        if (kho[i].ma_kho == id) {
          $('#kho').text(kho[i].ten_kho);
        }
      }
    });
</script>


<div class="modal fade" id="form-chitiet">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
          <form action="" method="POST" role="form" id="chitiet-form">
            <input type="hidden" name="stt" id="stt" class="form-control" value="">

            <div class="form-group">
              <label for="">Tên</label>
              <input type="text" class="form-control" id="name" placeholder="Tên">
            </div>

            <div class="form-group">
              <label for="">Loại tài sản</label>
              <!-- <input type="text" class="form-control" id="ma_so" placeholder=""> -->
              <select name='ma_lts' class="form-control">
                <?php
                  foreach ($loai_ts as $key => $value) {
                    echo '<option value="'. $key .'">' . $value . '</option>';
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">SL</label>
              <input type="text" class="form-control" id="sl" placeholder="" value="1">
            </div>

            <div class="form-group">
              <label for="">DVT</label>
              <input type="text" class="form-control" id="dvt" placeholder="" value="Cái">
            </div>

            <div class="form-group">
              <label for="">Ngày SD</label>
              <input type="text" class="form-control" id="ngaysd" placeholder="" value="<?= date('d-m-Y') ?>">
            </div>

            <div class="form-group">
              <label for="">Số năm khấu hao</label>
              <input type="text" class="form-control" id="so_nam_khau_hao" value="10">
            </div>

            <div class="form-group">
              <label for="">Nguyên giá</label>
              <input type="text" class="form-control" id="nguyen_gia" placeholder="">
            </div>

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="add()">Save changes</button>
      </div>
    </div>
  </div>
</div>
