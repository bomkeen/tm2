<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../inc/tmlogo2.gif" class="pull-left"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ' navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'บันทึกการอบรม', 'url' => ['/name'],'visible' => !Yii::$app->user->isGuest],
            ['label' => 'ระบบรายงาน', 'url' => ['/report'],'visible' => !Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ?
['label' => 'เข้าระบบ', 'url' => ['/user/security/login']] :
['label' => 'Account(' . Yii::$app->user->identity->username . ')', 'items'=>[
    ['label' => 'Profile', 'url' => ['/user/settings/profile']],
    ['label' => 'Account', 'url' => ['/user/settings/account']],
    ['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
]],
['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Peeragad Poonsawat</p>

       
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
