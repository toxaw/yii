<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsModel */

$this->title = 'Create Students Model';
$this->params['breadcrumbs'][] = ['label' => 'Students Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
