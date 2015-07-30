<?php
use frontend\assets\AppAsset;
use frontend\assets\BowerAsset;
use frontend\widgets\Alert;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\widgets\NewestPost;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
BowerAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> - <?= \Yii::$app->setting->get('siteTitle') ?></title>
        <meta name="keywords" content="<?= \Yii::$app->setting->get('siteKeyword') ?>"/>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="wrap">

        <?= \frontend\widgets\Nav::widget(); ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
              
                <div class="col-sm-12">
                     技术支持：
                    <a href="">番茄魔方</a>         
                 </div>
            </div>
        </div>
    </footer>



    <div style="display:none">
        <?= \Yii::$app->setting->get('siteAnalytics'); ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>