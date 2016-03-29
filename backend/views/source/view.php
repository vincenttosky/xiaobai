<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Source;

/* @var $this yii\web\View */
/* @var $model backend\models\Source */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'main',
                'format' => 'raw',
                'value' => Html::a($model->main, ['software/view', 'id' => $model->main])
            ],
            [
                'attribute' => 'game',
                'format' => 'raw',
                'value' => Html::a($model->game, ['software/view', 'id' => $model->game])
            ],
            [
                'attribute' => 'right1',
                'format' => 'raw',
                'value' => Html::a($model->right1, ['software/view', 'id' => $model->right1])
            ],
            [
                'attribute' => 'right2',
                'format' => 'raw',
                'value' => Html::a($model->right2, ['software/view', 'id' => $model->right2])
            ],
            [
                'attribute' => 'right3',
                'format' => 'raw',
                'value' => Html::a($model->right3, ['software/view', 'id' => $model->right3])
            ],
            [
                'attribute' => 'right4',
                'format' => 'raw',
                'value' => Html::a($model->right4, ['software/view', 'id' => $model->right4])
            ],
            [
                'attribute' => 'below1',
                'format' => 'raw',
                'value' => Html::a($model->below1, ['software/view', 'id' => $model->below1])
            ],
            [
                'attribute' => 'below2',
                'format' => 'raw',
                'value' => Html::a($model->below2, ['software/view', 'id' => $model->below2])
            ],
            [
                'attribute' => 'after1',
                'format' => 'raw',
                'value' => Html::a($model->after1, ['software/view', 'id' => $model->after1])
            ],
            [
                'attribute' => 'after2',
                'format' => 'raw',
                'value' => Html::a($model->after2, ['software/view', 'id' => $model->after2])
            ],
            [
                'attribute' => 'after3',
                'format' => 'raw',
                'value' => Html::a($model->after3, ['software/view', 'id' => $model->after3])
            ],
            'created_at',
            'updated_at',
            'create_user_id',
            'update_user_id',
        ],
    ]) ?>

</div>
