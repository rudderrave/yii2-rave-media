<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('rave/media', 'Image Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Media'), 'url' => ['media/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="media-default-settings">
    <h1><?= $this->title ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading"><?= Yii::t('rave/media', 'Thumbnails settings') ?></div>
        <div class="panel-body">

            <?php if (Yii::$app->session->getFlash('successResize')) : ?>
                <div class="alert alert-success text-center">
                    <?= Yii::t('rave/media', 'Thumbnails sizes has been resized successfully!') ?>
                </div>
            <?php endif; ?>

            <p><?= Yii::t('rave/media', 'Current thumbnail sizes') ?>:</p>
            <ul>
                <?php foreach ($this->context->module->thumbs as $preset) : ?>
                    <li><strong><?= Yii::t('rave/media', $preset['name']) ?>
                            :</strong> <?= $preset['size'][0] . ' x ' . $preset['size'][1] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p><?= Yii::t('rave/media', 'If you change the thumbnails sizes, it is strongly recommended resize image thumbnails.') ?></p>
            <?= Html::a(Yii::t('rave/media', 'Do resize thumbnails'), ['/media/manage/resize'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>