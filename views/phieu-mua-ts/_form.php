<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */
/* @var $form yii\widgets\ActiveForm */

$khachhang = \app\models\KhachHang::find()->asArray()->all();
$tai_khoan = \app\models\TaiKhoan::find()->asArray()->all();

$last_id = \app\models\PhieuMuaTs::lastId() + 1;
$maphieu = 'NTSA' . str_pad($last_id, 5, '0', STR_PAD_LEFT) . '-' . date('m-y');

$this->registerJsFile('js/phieu-mua-ts.js', ['position' => \yii\web\View::PH_BODY_END]);

?>

<script type="text/javascript">
  var khachhang = <?= json_encode($khachhang); ?>;

</script>

<div class="phieu-mua-ts-form">

<div class="row">
  <div class="col-md-2">
    Đơn vị: <i>Cty CPTM xxx</i><br />
    Kho: <i id="kho"></i>
    
  </div>

</div>

  <div class="row text-center">
    <h1>Phiếu mua tài sản</h1>
    <p>
      <i>Ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></i>
    </p>
  </div>

  <div class="row">
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
      <div class="col-md-6">
          <div class="form-group">
            <label class="control-label col-sm-4">Người giao hàng:</label>

            <div class="col-sm-7">
              <?= Html::activeDropDownList($model, 'ma_nvc', 
              ArrayHelper::map($khachhang, 'ma_kh', 'ten_kh'),
              ['class' => 'form-control']); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-4">Địa chỉ:</label>

            <div class="col-sm-4">
              <i id="address"></i>
            </div>
          </div>


          <?= $form->field($model, 'so_phieu')->textInput(['value' => $maphieu]) ?>

          <?= $form->field($model, 'so_hoa_son')->textInput() ?>
          
          <div class="form-group">
            <label class="control-label col-sm-4">Số hóa đơn:</label>

            <div class="col-sm-4">
              <?= Html::activeTextInput($model, 'so_hoa_son', ['class'=> 'form-control']); ?>
            </div>
            <div class="col-sm-3">
              <?= Html::activeTextInput($model, 'ngay_phat_hanh_hd', ['class'=> 'form-control']); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">của:</label>

            <div class="col-sm-4">
              <?= Html::activeDropDownList($model, 'ma_nvc', 
              ArrayHelper::map($khachhang, 'ma_kh', 'ten_kh'),
              ['class' => 'form-control']); ?>
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
                ArrayHelper::map($tai_khoan, 'ma_tk', 'ten_tk'),
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


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    window.t = $('#chi-tiet-phieu-mua').DataTable();

    function add() {
      var data = [0];
      var ok = false;
      $('#chitiet-form input').each(function(i, e) {
        data[i] = $(e).val();
        $(e).val('');
        if (data[i].length > 0) ok = true;
      });

      if (!ok) return alert('Error, please try again!');
      window.t.row.add(data).draw(true);
      $('#form-chitiet').modal('hide');
    };
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
              <label for="">Mã số</label>
              <input type="text" class="form-control" id="name" placeholder="">
            </div>

            <div class="form-group">
              <label for="">SL</label>
              <input type="text" class="form-control" id="name" placeholder="" value="1">
            </div>

            <div class="form-group">
              <label for="">DVT</label>
              <input type="text" class="form-control" id="name" placeholder="" value="Cái">
            </div>

            <div class="form-group">
              <label for="">Ngày SD</label>
              <input type="text" class="form-control" id="name" placeholder="" value="<?= date('d-m-Y') ?>">
            </div>

            <div class="form-group">
              <label for="">Số năm khấu hao</label>
              <input type="text" class="form-control" id="name" value="10">
            </div>

            <div class="form-group">
              <label for="">Nguyên giá</label>
              <input type="text" class="form-control" id="name" placeholder="">
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