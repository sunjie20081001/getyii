<?php
/**
 * 课程详情页面
 * Created by PhpStorm.
 * User: sun
 * Date: 8/3/15
 * Time: 6:46 PM
 */
/* @var $this yii\web\View */
/* @var $model common\models\Course */

use yii\helpers\Html;

$this->title = Html::encode($model->title);
?>


<div class="course-view row">
    <div class="col-md-8">
            <!--视频宣传 start-->
            <div class="course-vide">
                
            </div>
            <!--视频宣传 end-->
    </div>
    <div class="col-md4">
            <!--作者简介 start-->
        <div class="panel panel-default thumbnail center">
            <img class="img-circle img-responsive" src="<?php?>" alt="">
            <?php echo Html::img($author->getUserAvatar(200),['class'=>'img-circle img-responsive'])?>
                <h1 class="text-center"><strong>小胖</strong></h1>
                <p class="text-center"></p>
        </div>
            <!--作者简介　end-->
    </div>
</div>

<!--视频列表　start-->
<div class="course-list">
    
</div>
<!--视频列表　end-->

