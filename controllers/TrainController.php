<?php

namespace app\controllers;

use Yii;
use app\models\Train;
use app\models\TrainScarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Name;
use app\models\NameScarch;
use yii\filters\AccessControl;

/**
 * TrainController implements the CRUD actions for Train model.
 */
class TrainController extends Controller
{
    /**
     * @inheritdoc
     */
   public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','delete','view','list' ], //เฉพาะ action create,update
                'rules' => [
                    [
                        'allow' => true, //ยอมให้เข้าถึง
                        'roles' => ['@']//คนที่เข้าสู่ระบบ
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all Train models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NameScarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

      public function actionList($code)
    {
        $searchModel = new TrainScarch(['name_id'=>$code]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $profile=  Name::findOne($code);
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'profile'=>$profile
        ]);
    }
  
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $profile=  Name::findOne($model->name_id);
        return $this->render('view', [
            'model' => $model,'profile'=>$profile
        ]);
    }

    /**
     * Creates a new Train model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($code)
    {
        $model = new Train();
$profile= Name::findOne($code);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->date_update = date('Y-m-d');
            $model->save();
            
            return $this->redirect(['list', 'code' => $code]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'profile'=>$profile
            ]);
        }
    }

    /**
     * Updates an existing Train model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $profile= Name::findOne($model->name_id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->train_id]);
        } else {
            return $this->render('update', [
                'model' => $model,'profile'=>$profile
            ]);
        }
    }

  
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
       $train=  Train::findOne($id);
       $profile=  Name::findOne($train->name_id);

        return $this->redirect(['train/list','code'=>$profile->code]);
    }

    protected function findModel($id)
    {
        if (($model = Train::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
