<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Software */

$this->title = Yii::t('app', 'Update ') . Yii::t('app', 'Softwares') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Softwares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="software-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
