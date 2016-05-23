<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



?>
<?php
$this->title = 'Гостевая книга';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $f = ActiveForm::begin(); ?>

<?= $f->field($form, 'name') ?>
<?= $f->field($form, 'email') ?>
<?= $f->field($form, 'url') ?>
<?= $f->field($form, 'text')->textArea(['rows' => 6]) ?>

<?= Html::submitButton('отправить');?>

<?php ActiveForm::end(); ?>