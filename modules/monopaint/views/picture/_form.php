<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\monopaint\model\Picture */

$saveButton = Html::button('Save', [
    'title' => 'Save Picture',
    'class' => 'showModalButton btn btn-success'
]);

$updateButton = Html::button('Update', [
    'title' => 'Update Picture',
    'class' => 'btn btn-success',
    'type'  => 'submit',
    'form'  => 'canvasForm',
]);
?>

<div class="row">
    <div class="col-md-2">
        <div class="btn-group-vertical pull-right" role="group">
            <button class="btn btn-default" name="tool" value="pencil" type="button">Pencil</button>
            <button class="btn btn-default" name="tool" value="line" type="button">Line</button>
            <button class="btn btn-default" name="tool" value="rect" type="button">Rect</button>
            <button class="btn btn-default" name="tool" value="circle" type="button">Circle</button>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Size
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a name="size" data-size="1" onclick="return false;" href="#">Small</a></li>
                    <li><a name="size" data-size="5" onclick="return false;" href="#">Medium</a></li>
                    <li><a name="size" data-size="10" onclick="return false;" href="#">Large</a></li>
                </ul>
            </div>
            <?= !empty($model->fileName) ? $updateButton : $saveButton; ?>
            <button id="clear" class="btn btn-primary" type="button">Clear</button>
        </div>
    </div>

    <div class="col-md-10">
        <canvas class="table-bordered pull-left" id="drawingCanvas" width="700" height="400"></canvas>
    </div>

    <?php if ($model->fileName){

        $form = ActiveForm::begin([
            'options' => [
                'id' => 'canvasForm',
                'enctype' => 'multipart/form-data'
            ]
        ]);

        echo $form->field($model, 'data')->hiddenInput(['id' => 'canvasData'])->label('');
        echo Html::hiddenInput('picture', $model->getPictureUrl(), ['id' => 'picture']);
        ActiveForm::end();

    } ?>
</div>
