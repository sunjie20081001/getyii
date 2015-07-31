<?php
use yii\helpers\Html;
use yii\helpers\Markdown;

/* @var $this yii\web\View */
$this->title = '番茄魔方讲师招募';
// $this->params['breadcrumbs'][] = $this->title;
$content = '
##想尝试网络讲师的滋味吗？快加入番茄魔方网讲师队伍吧！
###招募人群:
> * 魔方热爱者  
> * 有魔方老师经验；

###我们希望你：
 
> * －热衷分享;
> * －热爱魔方； 
> * －有接触魔方半年以上经验；
> * －有带徒弟成功经验；
> * －至少精通二至七阶、五魔、sq－1、魔表、斜转、金字塔、速叠杯、魔板、其他异形中的一项；
> * －会50％以上的魔方项目。

###你的收获：
> * －额外收入；
> * －技术的沉淀与分享；
> * －速度增长的粉丝及业内知名度；
> * －讲师兼版主获得——小米摄像机。

###联系方式：
> * 讲师商务qq：
> * 讲师信箱：
';
?>
<div class="container p0">
    <div class="panel panel-default">
        <div class="panel-heading">
                番茄魔方讲师招募
        </div>
        <div class="panel-body">
            <?= Markdown::process($content) ?>
        </div>
    </div>
</div>