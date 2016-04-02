<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="software-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'type')->radioList([
        '0' => '软件',
        '1' => '图片',
    ]); ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <div class="form-group col-lg-1">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>

</div>