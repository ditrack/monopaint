<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\monopaint\model\Picture */

$this->title = 'View Picture';
$this->params['breadcrumbs'][] = ['label' => 'List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="text-center">
        <?= Html::img($model->getPictureUrl(), ['class' => 'table-bordered']); ?>
    </div>
</div>
