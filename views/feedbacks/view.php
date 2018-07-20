<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedbacks */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbacks-view">

    <h1><?= $model->title ?></h1>
    <p><?= $model->text?></p>
    <p><?= $model->date?></p>


</div>
