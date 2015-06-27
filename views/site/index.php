<?php
/* @var $this yii\web\View */
$this->title = 'Start page';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully start application.</p>

        <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['monopaint/picture']); ?>">Go to module</a></p>
    </div>

</div>
