<?php



use yii\helpers\Html;
use frontend\widgets\Term;
use yii\widgets\ListView;

$this->title = "课程"
?>

<!--课程分类导航 start-->
<div class="course-terms">
    <?= Term::widget(); ?>
</div>
<!--课程分类导航 end-->
<div class="course-sort">
    <div class="container">
        <a href="<?php?>" class="btn-circle " data-toggle="tooltip" data-placement="top" title="" data-original-title="最新">
        
        <i class="es-icon es-icon-history"></i>
      </a>
      <?= Html::a('<i class="es-icon es-icon-history"></i>',['',],[])?>
    </div>
</div>
<!--视频列表 start-->
<div class="course-list">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions'  => ['class' => 'col-md-4'],
            'summary'      => false,
            'itemView'     => '_item',
            'layout'       => '<div class="row">{items}</div>{pager}'
        ])?>
    </div>
</div>
<!--视频列表 end-->