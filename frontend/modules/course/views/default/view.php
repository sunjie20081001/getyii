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
use frontend\assets\VideoAsset;

VideoAsset::register($this);
$this->title = Html::encode($model->title);
?>


<div class="course-view row">
    <div class="col-md-8">
            <!--视频宣传 start-->
            <div class="course-video">
                 <?php echo Html::a(Html::img($model->image));?>
            </div>
            <!--视频宣传 end-->
    </div>
    <div class="col-md-4">
            <!--作者简介 start-->
        <div class="panel panel-default thumbnail center">
            <?php echo Html::img($author->getUserAvatar(200),['class'=>'img-circle img-responsive'])?>
                <h1 class="text-center"><strong><?php echo $author->label;?></strong></h1>
                <p class="text-center"><?php echo $author->tagline;?></p>
        </div>
            <!--作者简介　end-->
    </div>
</div>

<!--视频列表　start-->
<div class="course-list row">
    <div class="col-md-12">
        <ul class="list-group">
               <?php
                   foreach($videos as $video){
                       ?>
                       <li class="list-group-item">
                           <?php echo  Html::a(Html::encode($video->title),['/course/video/view', 'id'=>$video->id]);?>
                       </li>
                       <?php
                   }
               ?>
        </ul>
    </div>
</div>
<!--视频列表　end-->

