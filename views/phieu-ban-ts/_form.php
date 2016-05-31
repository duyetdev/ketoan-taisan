
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTs */
/* @var $form yii\widgets\ActiveForm */

$khachhang = \app\models\KhachHang::find()->asArray()->all();
$tai_khoan = \app\models\TaiKhoan::find()->asArray()->all();
$kho = \app\models\Kho::find()->asArray()->all();
$taisan = \app\models\TaiSan::find()->asArray()->all();
$loai_ts_model = \app\models\LoaiTaiSan::find()->asArray()->all();
$loai_ts = [];
foreach ($loai_ts_model as $loat_t) {
  $loai_ts[$loat_t['ma_lts']] = $loat_t['ten_loai'] . ' - Tài khoản: ' . $loat_t['ma_tk'];
}

$errors = $model->getErrors();
// print_r($errors);die;
$last_id = \app\models\PhieuBanTs::lastId() + 1;
$maphieu = 'BTSA' . str_pad($last_id, 5, '0', STR_PAD_LEFT) . '-' . date('m-y');

$this->registerJsFile('js/phieu-mua-ts.js', ['position' => \yii\web\View::PH_BODY_END]);

?>

<script type="text/javascript">
  var khachhang = <?= json_encode($khachhang); ?>;
  var kho = <?= json_encode($kho); ?>;
  var taisan = <?= json_encode($taisan); ?>;

</script>

<div class="phieu-ban-ts-form">

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

    <div class="form-group">
      <label class="control-label col-sm-4">Tài khoản</label>

      <div class="col-sm-7">
        <?= Html::activeDropDownList($model, 'ma_tk',
          ArrayHelper::map($tai_khoan, 'ma_tk', function($i) { return $i['ma_tk'] . ' - ' . $i['ten_tk']; }),
          ['class' => 'form-control']); ?>
      </div>
    </div>
  </div>
</div>

  <div class="row text-center">
    <h1>Phiếu bán tài sản</h1>
    <p>
      <i>Ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></i>
    </p>
    <br />
  </div>

  <div class="row">
      <div class="col-md-6">

          <div class="form-group">
            <label class="control-label col-sm-4">Khách hàng:</label>

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_kh',
              ArrayHelper::map($khachhang, 'ma_kh', function($i) { return $i['ten_kh'] . ' - Mã NCC: ' . $i['ma_kh']; }),
              ['class' => 'form-control ncc']); ?>
            </div>
          </div>


         <div class="form-group">
            <label class="control-label col-sm-4">Địa chỉ khách hàng:</label>

            <div class="col-sm-7">
              <i class="form-control" id="address" style="cursor:disable"></i>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-4">Người giao hàng:</label>

            

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_nvc',
              ArrayHelper::map($khachhang, 'ma_kh', function($i) { return $i['ten_kh'] . ' - Mã KH: ' . $i['ma_kh']; }),
              ['class' => 'form-control ma_nvc']); ?>
            </div>
          </div>
          


          <div class="form-group">
              <label class="control-label col-sm-4">Kho</label>

              <div class="col-sm-7">
                <?= Html::activeDropDownList($model, 'ma_kho',
                  ArrayHelper::map($kho, 'ma_kho', 'ten_kho'),
                  ['class' => 'form-control']); ?>
              </div>
            </div>

          <?= $form->field($model, 'ly_do')->textArea(['label' => '']) ?>
      </div>
      <div class="col-md-6">



          <div class="form-group">
            <label class="control-label col-sm-4">Số hóa đơn:</label>

            <div class="col-sm-7">
              <?= Html::activeTextInput($model, 'so_hoa_don', ['class'=> 'form-control']); ?>
            </div>
          </div>

            <div class="form-group field-phieubants-loai_hoa_don has-success">
              <label class="control-label col-sm-4" for="phieubants-ngay_hoa_don">Ngày phát hành HD</label>
              <div class="col-sm-7">
              <input type="date" id="phieubants-ngay_hoa_don" class="form-control" name="PhieuBanTs[ngay_hoa_don]" maxlength="45">
              <div class="help-block help-block-error "></div>
              </div>
            </div>


          <?= $form->field($model, 'loai_hoa_don')->textInput(['maxlength' => true]) ?>


          <div class="form-group field-phieubants-thue_suat">
            <label class="control-label col-sm-4" for="phieubants-ngay_hoa_don">Thuế suất</label>
            <div class="col-sm-7">
              <div class="input-group">
              <input type="text" class="form-control" id="exampleInputAmount"  name="PhieuBanTs[thue_suat]" value="10">
              <div class="input-group-addon">%</div>
            </div>
            </div>
          </div>

      </div>
      </div>

      <br />
      <br />
      <br />

      <input type="hidden"  name="chi-tiet-phieu-ban" value="">


      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover" id="chi-tiet-phieu-ban">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên, nhãn hiệu,quy cách, phẩm chất vật tư, sản phẩm</th>
                <th>SL</th>
                <th>DVT</th>
                <th>Giá bán</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" class="text-center table-add-row" data-toggle="modal" data-target="#form-chitiet">
                  <i><span class="glyphicon glyphicon-plus"></span> Thêm tài sản</i>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <br>
      <div class="row text-center">
        <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="/js/jquery.price_format.2.0.min.js"></script>

<script type="text/javascript">
    window.t = $('#chi-tiet-phieu-ban').DataTable();

    jQuery(document).ready(function($) {
      
      $('#gia_ban').priceFormat({
          prefix: '',
          centsSeparator: ',',
          thousandsSeparator: '.',
          centsLimit: 0,
          clearPrefix: true,
          suffix: ' VND'
      });

    });

    // $(document).ready(function() {
    // $('#chi-tiet-phieu-ban').on('page.dt', function() {
    //   alert(window.t.rows().data())
    // }); 
    // }); 

    function updateFormData(data_raw) {
      var x = data_raw || window.t.rows().data()
      var data = []

      for (var i = 0; i < x.length; ++i)
        data[i] = x[i];

      $('[name=chi-tiet-phieu-ban]').val(JSON.stringify(data));
    }

    Array.prototype.insert = function (index, item) {
      this.splice(index, 0, item);
    };


    var data_raw = []
    function add() {
      if (!$('#gia_ban').val() || $('#gia_ban').val() == '0') return alert('Vui lòng nhập nguyên giá');
      var data = [];

      var ii = 0;
      var ok = false;
      $('#chitiet-form input, #chitiet-form select').each(function(i, e) {
        data[ii++] = $(e).val();
        // $(e).val('');
        if (data[i].length > 0) ok = true;
      });
      data[0] = window.t.rows().data().length + 1;

      // data.insert(2, 1);
      // data.insert(3, 'Cái');

      for (var i in taisan) {
        if (taisan[i].ma_ts == data[1]) {
          data.insert(2, taisan[i].so_luong);
          data.insert(3, taisan[i].dvt);
          data_raw.push($.extend([], data));
          data[1] = taisan[i].ten_ts;
          break;
        }
      }

      if (!ok) return alert('Error, please try again!');
      window.t.row.add(data).draw(true);
      $('#form-chitiet').modal('hide');
      updateFormData(data_raw);
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
    $('#phieubants-ma_kho').on('change', function(e) {
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
        <h4 class="modal-title">Tài sản</h4>
      </div>
      <div class="modal-body">
          <form action="" method="POST" role="form" id="chitiet-form">
            <input type="hidden" name="stt" id="stt" class="form-control" value="">

            <div class="form-group">
                <label>Tài sản:</label>
                <select name='ma_ts' class="form-control">
                  <?php
                    foreach ($taisan as $onets) {
                      echo '<option value="'. $onets['ma_ts'] .'">' . $onets['ten_ts'] . '</option>';
                    }
                  ?>
                </select>
            </div>

            <div class="form-group">
              <label for="">Giá bán</label>
              <input type="text" class="form-control" id="gia_ban" placeholder="">
            </div>

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" onClick="add()">Lưu thay đổi</button>
      </div>
    </div>
  </div>
</div>

