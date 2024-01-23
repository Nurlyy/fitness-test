<?php 

use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Clubs;
use yii\helpers\Url;

?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'address',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clubs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>