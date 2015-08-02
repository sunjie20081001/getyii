<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

你好 <?= Html::encode($user->username) ?></br>
通过以下链接，更新密码：

<?= Html::a(Html::encode($resetLink), $resetLink) ?>
