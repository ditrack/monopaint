<!-- Modal -->
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\monopaint\model\Picture */

yii\bootstrap\Modal::begin([
    'header' => '<h4>Set Access</h4>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
]);
?>

<div id='modalContent'>
    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'access-form',
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'data')->hiddenInput(['id' => 'canvasData'])->label('') ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'access-button']) ?>
        <?= Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
    </div>

    <?php
        if (!empty($model->fileName)) {
            echo Html::hiddenInput('picture', $model->getPictureUrl(), ['id' => 'picture']);
        }
    ?>
    <?php ActiveForm::end(); ?>
</div>

<?php yii\bootstrap\Modal::end(); ?>