<?php

use yii\helpers\Html;
use app\modules\monopaint\assets\CanvasAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\monopaint\model\Picture */

$this->title = 'Update Picture';
$this->params['breadcrumbs'][] = ['label' => 'List', 'url' => ['picture/index']];
$this->params['breadcrumbs'][] = $this->title;
CanvasAsset::register($this);
?>
<div class="picture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
