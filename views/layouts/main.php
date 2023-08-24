<?php

$session = Yii::$app->session;
$session->open();
if ($session->isActive) {
    $user = Yii::$app->user->id;
}

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md fixed-top', 'style' => 'color: black; background: white; padding-top: 2vh;'],
    ]);
    $items = [];
    if(Yii::$app->user->isGuest){
        // $items[] = ['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    } else{
        if(Yii::$app->user->identity->role==1){
            $items[] = ['label' => 'Административная панель', 'url' => ['/admin']];
        } else{
            $items[] = ['label' => 'Личный кабинет', 'url' => ['/user/view'.'?id='.$user]];
            $items[] = ['label' => 'Корзина', 'url' => ['/basket']];
            $items[] = ['label' => 'Избранное', 'url' => ['/like']];
        }
        $items[] = '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выйти',
                        ['class' => 'nav-link btn btn-link logout', 'style' => 'color: var(--bs-nav-link-color); margin-right: 1vw;'],
                    )
                    . Html::endForm()
                    . '</li>';
        $items[] = '
        <form method="get" action="'.Url::to(['/site/search']).'">
            <input type="text" class="text" name="search" placeholder="Найти в FoodStore" style="border: solid 1px;
            border-radius: 1em;
            width: 30vw;
            height: 5vh;
            padding: 1em;"/>
        </form>
        ';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <?= var_dump($user); ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; FoodStore <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            <!-- <div class="col-md-6 text-center text-md-start"><?= Yii::powered() ?></div> -->
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
