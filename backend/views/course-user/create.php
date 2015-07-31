<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoruseUser */

$this->title = 'Create Coruse User';
$this->params['breadcrumbs'][] = ['label' => 'Coruse Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coruse-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
