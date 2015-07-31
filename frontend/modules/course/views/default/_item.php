<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
?>
<div class="video-li">    
    <?php print_r($model);?>
    <div class="v-img">
        <?php echo Html::a(Html::img($model->image)) ;?>
    </div>
    <div class="v-title">
        <?php echo Html::a(Html::encode($model->title));?>
    </div>
    <div class="v-desc">
        <?php echo Html::encode($model->excerpt);?>
    </div>
</div>
