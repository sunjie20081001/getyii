<?php
use yii\helpers\Html;
use yii\helpers\Markdown;

/* @var $this yii\web\View */
$this->title = '十七阶申请体验活动';
// $this->params['breadcrumbs'][] = $this->title;
$content = '
###一、体验简述：
> 番茄魔方为魔友提供十七阶魔方体验的机会，
> 十七阶魔方是目前为止世界上第一高阶数的魔方，
> 接近魔方现实设计的极限。设计该魔方从研发到成品总共花费了足足52个月的时间。
> 十七阶魔方已经在美国上市，史上最难十七阶魔方耗时7.5小时的记录。

###二、体验群体：  
> 个人、社团

###三、开放时间：
> 每月三轮

###四、体验资格：
> 个人：魔方水平单项国内前十；
> 有WCA或CCA记录；
> 社团：大学魔方社团

###五、体验流程：

> 1. 申请：填申请表，加QQ私聊的方式，另外社团出示社团活动照片发至邮箱
> 2. 体验形式是邮寄（社团）或来北京当面（个人）体验
> 3. 每轮次3－5天的体验时间
> 4. 体验时间结束后按时回寄，方便下轮开放体验
> 5. 体验者需提供体验十七阶活动的照片及影像。

###六、每月27-30号公布下月体验名单

###七、联系方式：
>  十七阶体验QQ:5654675476547   
>  体验信箱：453454353
';
?>
<div class="container p0">
    <div class="panel panel-default">
        <div class="panel-heading">
                十七阶申请体验活动
        </div>
        <div class="panel-body">
            <?= Markdown::process($content) ?>
        </div>
    </div>
</div>