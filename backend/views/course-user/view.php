<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoruseUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coruse Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coruse-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'user_id',
            'course_id',
            'video_id',
            'watch_time:datetime',
        ],
    ]) ?>

</div>
