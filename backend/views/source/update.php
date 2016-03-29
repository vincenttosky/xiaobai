<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Source */

$this->title = Yii::t('app', 'Update ') . Yii::t('app', 'Source') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="source-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
