<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Stat;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stat');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stat-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'mac',
            'channel',
            'version', 
            'oper', 
            'bdict',  
            'created_at',
        ],
    ]); ?>

</div>
