<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация на портале';
?>



 <!-- Contact Section -->
  <section id="login">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Авторизация:</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'enableAjaxValidation' => true,
        'fieldConfig' => [
            'template' => '            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                {input}
                <p class="help-block text-dangers">{error}</p>
              </div>
            </div>',
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>


        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Логин']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>

        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-xl']) ?>
        </div>

    <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </section>
<div class="col-md-6">
