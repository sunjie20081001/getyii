<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Course;
use common\models\Chapter;
use yii\web\View;
use backend\assets\ChapterAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */


if(isset($model->chapter_id)){
    $jsString = 'window.videoChapterId = ' . $model->chapter_id .';';
    $this->registerJs($jsString, View::POS_HEAD);
}
$jsStr = 'var chapterListUrl = "'.\yii\helpers\Url::to(['chapterlist']).'";';
$this->registerJs($jsStr, View::POS_HEAD);
ChapterAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'course_id')->dropdownList(Course::getCourseArray()) ?>

    <?= $form->field($model, 'chapter_id')->dropDownList(array());?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

