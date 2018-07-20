<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbacksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
?>
<div class="feedbacks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedbacks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php foreach($feedbacks as $feedback): ?>
        <a href="<?=\yii\helpers\Url::base()?>/feedbacks/view?id=<?=$feedback->id?>">
            <?= $feedback->title; ?>
        </a><hr>
    <?php endforeach; ?>

</div>
