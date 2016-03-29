<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Source;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Source */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",  
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'main')->dropDownList(Source::getMainSofts()) ?>

    <?= $form->field($model, 'game')->dropDownList(Source::getGameSofts()) ?>

    <?= $form->field($model, 'right1')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'right2')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'right3')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'right4')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'below1')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'below2')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'after1')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'after2')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'after3')->textInput(['maxlength' => 32]) ?>


    <div class="form-group col-lg-1">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
