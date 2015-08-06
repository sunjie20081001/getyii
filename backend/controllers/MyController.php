<?php
namespace backend\controllers;

use Yii;

class MyController extends \common\components\Controller{
	/**
	* 后台所有的行为都要进行登录才能操作
	*/
	function beforeAction($action){
		if(!parent::beforeAction($action)){
			return false;
		}
		if(\Yii::$app->user->isGuest){ 
			return $this->goHome();
		}
		return true;
	}
}