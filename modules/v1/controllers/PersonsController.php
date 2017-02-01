<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\PersonsModel;
class PersonsController extends \yii\web\Controller
{

	public $enableCsrfValidation = false;
    public function actionIndex()
    {
        //return $this->render('index');
    }

    public function actionCreatePerson()
    {
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$persons = new PersonsModel();
    	$persons->scenario = PersonsModel::SCENARIO_CREATE;
    	$persons->attributes = \Yii::$app->request->post();

    	if($persons->validate()){
    		$persons->save();
    		return array('status'=>true, 'data'=>'Persons Create Succesfully');
    	}else{
    		return array('status'=>false, 'data'=>$persons->getErrors());
    	}
        //return $this->render('index');
    }
    public function actionListPersons(){
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$personsList = PersonsModel::find()->all();
    	if(count($personsList) > 0){
    		return array('status'=> true, 'data'=>$personsList);
    	}else{
    		return array('status'=> false, 'data'=>'No persons found');
    	}
    }
    public function actionUpdatePersons($id){
    	return $id;
    }
}
