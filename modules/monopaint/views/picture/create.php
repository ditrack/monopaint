<?php

use yii\helpers\Html;
use app\modules\monopaint\assets\CanvasAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\monopaint\model\Picture */

$this->title = 'Draw Picture';
$this->params['breadcrumbs'][] = ['label' => 'List', 'url' => ['picture/index']];
$this->params['breadcrumbs'][] = $this->title;
CanvasAsset::register($this);
?>
<div class="picture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?= $this->render('_form_modal', ['model' => $model]); ?>
