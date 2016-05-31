<?php

namespace app\controllers;

use Yii;
use app\models\PhieuBanTs;
use app\models\PhieuBanTsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\TaiKhoan;
use app\models\LoaiTSTaiKhoan;

/**
 * PhieuBanTsController implements the CRUD actions for PhieuBanTs model.
 */
class PhieuBanTsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'ngay_ban',
                    // ActiveRecord::EVENT_BEFORE_UPDATE => 'ngay_lap',
                ],
                'value' => function() { return date('U'); },
            ],
        ];
    }

    /**
     * Lists all PhieuBanTs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhieuBanTsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhieuBanTs model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionView($id)
    {
        $nextId = $this->getNextID($id);
        $prevId = $this->getPrevID($id);
        // $c = $this->getNewSmallestID();
        // print_r($a);
        // print_r($b);
        // print_r($c);
        //die;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'nextId' => $nextId,
            'prevId' => $prevId,
            // 'c' => $c,
        ]);
    }

    /**
     * Creates a new PhieuBanTs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhieuBanTs();
        // $model->ngay_lap = new Expression('NOW()');

        $kho = \app\models\Kho::find()->all();

        $last_id = $this->getNewSmallestID()[0]['id'];
        // $model->so_pm = $last_id;
        $model->so_phieu = 'BTSA' . str_pad($last_id, 5, '0', STR_PAD_LEFT) . '-' . date('m-y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $chiTietPhieuBan = Yii::$app->request->post()['chi-tiet-phieu-ban'];
            $phieuBan = $model;
            $chiTietPhieuBan = json_decode($chiTietPhieuBan);
            //echo impode(' ',$chiTietPhieuBan);die;

            if (count($chiTietPhieuBan)) {

                foreach ($chiTietPhieuBan as $key => $item) {
                    // print_r($item);die;
                    //cho $item;die;

                    $ts = \app\models\TaiSan::find()->where(['ma_ts' => intval($item[1])])->one();
                    // print_r($ts);die;
                    $ts->so_luong = intval('0');
                    $tien = $this->getPrice($item[4]);
                    if ($ts->save()) {
                        $ct = new \app\models\chiTietPhieuBan();
                        $ct->so_pb = $phieuBan->so_pb;
                        $ct->ma_ts = $ts->ma_ts;

                        $ct->so_tien = $tien;
                        if (!$ct->save()) {
                            echo 'Lỗi nhập chi tiết phiếu ban! <br />';
                            print_r($ct->getErrors());
                            die;
                        }
                    } else {
                        echo 'Lỗi nhập TS! <br />';
                        print_r($ts->getErrors());
                        die;
                        return $this->render('create', [
                            'model' => $model,
                            'kho' => $kho,
                            'nextId' => $this->getNewSmallestID()
                        ]);
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->so_pb]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'kho' => $kho,
                'nextId' => $this->getNewSmallestID()
            ]);
        }
    }
    /**
     * Updates an existing PhieuBanTs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->so_pb]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhieuBanTs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PhieuBanTs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhieuBanTs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhieuBanTs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getNextID($cur_id)
    {
        $id = Yii::$app->db->createCommand("select f_getNextID_PB(".intval($cur_id).") as id")
        ->queryAll();

        return $id[0]['id'];
    }

    public function getPrevID($cur_id)
    {
        $id = Yii::$app->db->createCommand("select f_getPrevID_PB(".$cur_id.") as id")
        ->queryAll();

        return $id[0]['id'];
    }

    public function getNewSmallestID()
    {
        return Yii::$app->db->createCommand("select f_getNewSmallestID_PB() as id")
        ->queryAll();
    }

    public function getPrice($string) {
        $number = preg_replace("/[^0-9]/", "", $string);

        return intval($number);
    }

}
