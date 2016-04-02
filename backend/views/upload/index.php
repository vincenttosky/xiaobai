<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Upload;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Upload');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create ') . Yii::t('app', 'Upload'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'type',
                'value' => function($model) {
                    return $model->getUploadTypeName();
                },
            ],
            'url',
            'note', 
            'created_at',
            'updated_at',
            'create_user_id',
            'update_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
