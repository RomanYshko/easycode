<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php
$this->title = 'Гостевая книга';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-5">
<?php $f = ActiveForm::begin(); ?>
     <?= $f->field($model, 'name') ?>
     <?= $f->field($model, 'email') ?>
     <?= $f->field($model, 'url') ?>
     <?= $f->field($model, 'text')->textArea(['rows' => 6]) ?>
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

<?php ActiveForm::end(); ?>
<div>
<?php foreach ($users as $user): ?>
    <?= $user->name ?>
    <?= "<br />"?>
    <?= $user->email?>
    <?= "<br />"?>
    <?= $user->url?>
    <?= "<br />"?>
    <?= $user->text?>
<?php endforeach;?>
    </div>
        </div>
    </div>

