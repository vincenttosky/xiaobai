<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Source;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Source');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create ') . Yii::t('app', 'Source'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'main',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->main, ['software/view', 'id' => $model->main]);
                },
            ],
            [
                'attribute' => 'game',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->game, ['software/view', 'id' => $model->game]);
                },
            ],
            [
                'attribute' => 'right1',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->right1, ['software/view', 'id' => $model->right1]);
                },
            ],
            [
                'attribute' => 'right2',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->right2, ['software/view', 'id' => $model->right2]);
                },
            ],
            [
                'attribute' => 'right3',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->right3, ['software/view', 'id' => $model->right3]);
                },
            ],
            [
                'attribute' => 'right4',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->right4, ['software/view', 'id' => $model->right4]);
                },
            ],
            [
                'attribute' => 'below1',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->below1, ['software/view', 'id' => $model->below1]);
                },
            ],
            [
                'attribute' => 'below2',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->below2, ['software/view', 'id' => $model->below2]);
                },
            ],
            [
                'attribute' => 'after1',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->after1, ['software/view', 'id' => $model->after1]);
                },
            ],
            [
                'attribute' => 'after2',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->after2, ['software/view', 'id' => $model->after2]);
                },
            ],
            [
                'attribute' => 'after3',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->after3, ['software/view', 'id' => $model->after3]);
                },
            ],
            'created_at',
            'updated_at',
            'create_user_id',
            'update_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
