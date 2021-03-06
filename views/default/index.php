<?php

use ravesoft\assets\LanguagePillsAsset;
use ravesoft\media\assets\ModalAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('rave/media', 'Media');
$this->params['breadcrumbs'][] = $this->title;

ModalAsset::register($this);
LanguagePillsAsset::register($this);

?>

<div class="media-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('rave/media', 'Manage Albums'), ['/media/album/index'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <?= ravesoft\media\widgets\Gallery::widget() ?>

</div>

