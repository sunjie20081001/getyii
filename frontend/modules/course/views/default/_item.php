<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<div class="thumbnail">

    <?php echo Html::a(Html::img($model->image,['style' => 'height:200px; width:100%;display:block']));?>
    <div class="caption">
        <h3><?php echo Html::a(Html::encode($model->title));?></h3>
        <p><?php echo Html::encode($model->excerpt);?></p>
    </div>
</div>


