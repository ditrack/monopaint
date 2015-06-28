<?php

use yii\helpers\Html;
use app\modules\monopaint\model\Picture;
use app\modules\monopaint\assets\ModuleAsset;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $picture Picture */

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = $this->title;
ModuleAsset::register($this);

$this->registerJs('FancyBox.initFancybox();', View::POS_READY);
?>

<div class="container content">
    <div class="gallery-page">
        <div class="row margin-bottom-20">
            <?php foreach ($dataProvider->getModels() as $picture): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="table-bordered">
                        <a class="thumbnail fancybox-button zoomer box" data-rel="fancybox-button" title="Gallery"
                           href="<?= $picture->getPictureUrl(); ?>">
                        <span class="overlay-zoom">
                            <img alt="" src="<?= $picture->getPictureUrl(); ?>" class="img-responsive">
                            <span class="zoom-icon"></span>
                        </span>
                        </a>

                        <div class="text-center pading-bottom-5">
                            <?= Html::a('Edit', Url::to(['picture/update', 'id' => $picture->id]), [
                                'title' => 'Edit Picture',
                                'class' => 'btn btn-success btn-sm']);
                            ?>
                            <?= Html::a('View', Url::to(['picture/view', 'id' => $picture->id]), [
                                'title' => 'View Picture',
                                'class' => 'btn btn-primary btn-sm']);
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <?=
            \yii\widgets\LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ]); ?>
        </div>
    </div>
</div>
