<?php
	
use yii\helpers\Html;
use frontend\assets\VideoAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Video*/

VideoAsset::register($this);
$this->title = Html::encode($model->title);

?>
