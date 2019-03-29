<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'College';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                    <?php foreach($data as $value):?>
                        <div><?= Html::encode($value->id.' '.$value->name_long.' '.$value->name_short.' '.$value->date_start) ?></div>
                    <?php endforeach;?>
         </div>
        </div>

    </div>
</div>
