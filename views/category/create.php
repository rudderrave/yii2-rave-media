<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ravesoft\media\models\Category */

$this->title = Yii::t('rave/media', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Media'), 'url' => ['/media/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Albums'), 'url' => ['/media/album/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('rave', 'Create');
?>

<div class="media-category-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>