<?php
/**
 * author     : forecho <caizhenghai@gmail.com>
 * createTime : 15/4/20 下午9:16
 * description:
 */
use yii\helpers\Html;
?>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <?= \Yii::t('app', 'Received {0} reply', $model->comment_count) ?>
        <?php if ($tags = $model->tags): ?>
            <span class="pull-right">
                <i class="icon-tags"></i>
                <?php foreach (explode(',', $tags) as $key => $value){
                    echo Html::a(Html::encode($value),
                        ['/topic/default/index', 'tag' => $value],
                        ['class' => 'btn btn-xs btn-primary']
                    ), ' ';} ?>
            </span>
        <?php endif ?>
    </div>
    
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => ' media mt0 replay'],
        'summary' => false,
        'itemView' => '_item',
        'layout' =>'<div class="panel-body">{items}</div><div class="panel-footer">{pager}</div>',
    ]) ?>
</div>