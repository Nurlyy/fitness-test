<?php

use app\models\Clubs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ClubsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Клубы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать клуб', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'form-filter']]);
    ?>

    <?= $form->field($searchModel, 'name')->label('Club Name') ?>

    <?= $form->field($searchModel, 'showDeleted')->checkbox(['class' => 'show-deleted-checkbox']) ?>

    <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;', 'id' => 'search-button', 'type' => 'submit']) ?>

    <?php ActiveForm::end(); ?>

    <?php Pjax::begin(['id' => 'your-grid-pjax']); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'address',
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:Y-m-d H:i:s'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clubs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<script>
    $(document).ready(function() {
        // Handle checkbox change
        $(document).on('change', '.show-deleted-checkbox', function() {
            $.pjax.reload({
                container: '#your-grid-pjax',
                async: false,
                data: {
                    'ClubsSearch[showDeleted]': $(this).is(':checked') ? 1 : 0
                }
            });
        });

        // Handle form submission
        $(document).on('submit', '.form-filter', function(event) {
            event.preventDefault();
            $.pjax.reload({
                container: '#your-grid-pjax',
                async: false,
                data: $(this).serialize()
            });
        });

        // Optional: If you want to reload the GridView when the page is loaded
        $.pjax.reload({
            container: '#your-grid-pjax',
            async: false
        });
    });
</script>