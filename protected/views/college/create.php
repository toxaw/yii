<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CollegeModel */

$this->title = 'Create College Model';
$this->params['breadcrumbs'][] = ['label' => 'College Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
