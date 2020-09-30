<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ravesoft\media\models\Album */

$this->title = Yii::t('rave', 'Create {item}', ['item' => Yii::t('rave/media', 'Album')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Media'), 'url' => ['/media/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Albums'), 'url' => ['/media/album/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="album-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>