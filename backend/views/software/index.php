<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Software;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Softwares');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create ') . Yii::t('app', 'Softwares'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'soft_type',
                'value' => function($model) {
                    return $model->getSoftTypeName();
                },
            ],
            [
                'attribute' => 'download_url',
                'contentOptions' => ['style' => 'max-width: 80px; word-break: break-all;']
            ],
            [
                'attribute' => 'img_url',
                'contentOptions' => ['style' => 'max-width: 80px; word-break: break-all;']
            ],
            'title', 
            'desc',  
            'size', 
            'renqi', 
            'language', 
            'level',
            'created_at',
            'updated_at',
            'create_user_id',
            'update_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
