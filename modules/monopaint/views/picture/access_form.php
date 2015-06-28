<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\monopaint\model\AccessForm */

$this->title = 'Check Access';
?>

<div class="access-control">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following field to update picture:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'access-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'access-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>