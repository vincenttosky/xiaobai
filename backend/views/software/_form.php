<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Software;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Software */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="software-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",  
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'soft_type')->radioList([
        '0' => '广告软件',
        '1' => '主软件',
        '2' => '游戏',
        '3' => '导航',
    ]); ?>

    <?= $form->field($model, 'download_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'renqi')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'level')->textInput(['maxlength' => 32]) ?>

    <div class="form-group col-lg-1">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
