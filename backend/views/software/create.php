<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Software */

$this->title = Yii::t('app', 'Create ') . Yii::t('app', 'Softwares');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Softwares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
