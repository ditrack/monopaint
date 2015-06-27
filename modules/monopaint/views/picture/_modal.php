<!-- Modal -->
<?php
    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'id' => 'modal',
        'size' => 'modal-lg',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
    ]);

    echo "<div id='modalContent'></div>";

    yii\bootstrap\Modal::end();
?>