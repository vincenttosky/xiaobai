<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Upload;

/* @var $this yii\web\View */
/* @var $model backend\models\Upload */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-view">

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
                'attribute' => 'type',
                'value'=> $model->getUploadTypeName(),
            ],
            'url',
            'note', 
            'created_at',
            'updated_at',
            'create_user_id',
            'update_user_id',
        ],
    ]) ?>

</div>
