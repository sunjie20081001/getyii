<?php
	
use yii\helpers\Html;
use frontend\assets\VideoAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Video*/
/* @var $course common\models\Course*/
VideoAsset::register($this);
$this->title = Html::encode($model->title);

?>

<div class="row">
    <div class="col-md-12 video-view">
    <!--视频-->
        <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="500px"
               poster="<?php echo Html::encode($course->image)?>"
               data-setup="{}">
            <source src="<?php echo Html::encode($model->video_url);?>" type='video/mp4' />
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>

    </div>
    </div>
<!--课程标题 信息-->
<div class="row video-info">

</div>

<div class="row">
    <div class="col-md-12 video-list">
    <!--视频列表 start-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            foreach($chapters as $chapter){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $chapter->id;?>" aria-expanded="false" aria-controls="collapseOne">
                                <?php echo $chapter->title;?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $chapter->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="list-group">
                            <?php
                            foreach($chapter->videos as $video){
                                echo Html::a(Html::encode($video->title),['/course/video/view','id'=>$video->id],['class' => 'list-group-item']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</div>