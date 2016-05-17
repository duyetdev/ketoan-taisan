<?php

namespace app\controllers;

use Yii;
use app\models\PhieuMuaTs;
use app\models\PhieuMuaTsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * PhieuMuaTsController implements the CRUD actions for PhieuMuaTs model.
 */
class PhieuMuaTsController extends Controller
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
                    ActiveRecord::EVENT_BEFORE_INSERT => 'ngay_lap',
                    // ActiveRecord::EVENT_BEFORE_UPDATE => 'ngay_lap',
                ],
                'value' => function() { return date('U'); },
            ],
        ];
    }

    /**
     * Lists all PhieuMuaTs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhieuMuaTsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhieuMuaTs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $a = $this->getNextID($id);
        $b = $this->getPrevID($id);
        $c = $this->getNewSmallestID();
        print_r($a);
        print_r($b);
        print_r($c);
        //die;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'a' => $a,
            'b' => $b,
            'c' => $c,
        ]);
    }

    /**
     * Creates a new PhieuMuaTs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhieuMuaTs();
        // $model->ngay_lap = new Expression('NOW()');

        $kho = \app\models\Kho::find()->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $chiTietPhieuMua = Yii::$app->request->post()['chi-tiet-phieu-mua'];
            $phieuMua = $model;
            $chiTietPhieuMua = json_decode($chiTietPhieuMua);

            if (count($chiTietPhieuMua)) {

                foreach ($chiTietPhieuMua as $key => $item) {

                    $ts = new \app\models\TaiSan();
                    $ts->ten_ts = $item[1];
                    $ts->ma_lts = $item[2];
                    $ts->so_nam_khau_hao = $item[6];
                    $ts->nguyen_gia = $item[7];
                    $ts->dvt = $item[4];
                    if ($ts->save()) {
                        $ct = new \app\models\ChiTietPhieuMua();
                        $ct->so_pm = $phieuMua->so_pm;
                        $ct->ma_ts = $ts->ma_ts;
                        $ct->tk_doi_ung = $item[2]; // Ma so
                        $ct->so_tien = $ts->nguyen_gia * intval($item[3]);
                        if (!$ct->save()) {
                            echo 'Lỗi nhập chi tiết phiếu mua!';
                            die;
                        }
                    } else {
                        echo 'Lỗi nhập TS!';
                        print_r($ts->getErrors());
                        die;
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->so_pm]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'kho' => $kho,
            ]);
        }
    }

    /**
     * Updates an existing PhieuMuaTs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->so_pm]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhieuMuaTs model.
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
     * Finds the PhieuMuaTs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhieuMuaTs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhieuMuaTs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getNextID($cur_id)
    {
        return Yii::$app->db->createCommand("select f_getNextID(".intval($cur_id).")")
        ->queryAll();
    }

    public function getPrevID($cur_id)
    {
        return Yii::$app->db->createCommand("select f_getPrevID(".$cur_id.")")
        ->queryAll();
    }

    public function getNewSmallestID()
    {
        return Yii::$app->db->createCommand("select f_getNewSmallestID()")
        ->queryAll();
    }
}
