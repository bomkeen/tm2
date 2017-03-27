<?php

namespace app\controllers;
use yii;
class ReportController extends \yii\web\Controller {
    
    
    
    
    
public $enableCsrfValidation = false;
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionTrainperson() {
        $date1 = date('Y-m-d');
        $date2 = date('Y-m-d');
        $name='';
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');
            $date2 = $request->post('date2');
            $name=$request->post('name');
            $sql = "SELECT t.date_go as date_go,t.date_back as date_back,t.day_sum
,n.name as name
,t.activity as activity,t.place,IF(t.place_type=1,'ภายในโรงพยาบาล','ภายนอกโรงพยาบาล') as place_type,t.organize
,d.devalob_type as dev
,t.budget_hos,t.regist_price,t.allowance_price,t.travel_price,t.hotel_price,t.budget_organize,tt.train_type
FROM train AS t
LEFT JOIN name AS n on t.name_id=n.code LEFT JOIN devalob AS d ON t.devalob_type=d.devalob_type_id
LEFT JOIN train_type tt ON t.train_type=tt.train_type_id
WHERE n.name like '%$name%'  and t.date_go BETWEEN '$date1' AND '$date2' order by t.date_go";
            $rs = \Yii::$app->db->createCommand("$sql")->queryAll();
            $dataProvider = new \yii\data\ArrayDataProvider([
                'allModels' => $rs,
                'pagination' => FALSE,
            ]);
            return $this->render('trainperson', [
                        'date1' => $date1,
                        'date2' => $date2,
                        'dataProvider' => $dataProvider,'name'=>$name
            ]);
        } else {
            return $this->render('trainperson', [
                        'date1' => $date1, 'date2' => $date2,'name'=>$name
            ]);
        }
    }

}
