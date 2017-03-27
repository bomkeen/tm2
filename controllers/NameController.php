<?php

namespace app\controllers;

use Yii;
use app\models\Name;
use app\models\NameScarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use yii\filters\AccessControl;

/**
 * NameController implements the CRUD actions for Name model.
 */
class NameController extends Controller
{
    /**
     * @inheritdoc
     */
  public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','delete','view' ], //เฉพาะ action create,update
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
     * Lists all Name models.
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

 
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Name model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Name();
        $code= \Yii::$app->db->createCommand('select max(code) as code from name')->queryAll();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update_datetime = date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('create', [
                'model' => $model,'code'=>$code
            ]);
        }
    }

  
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

  
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Name model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Name the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Name::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
