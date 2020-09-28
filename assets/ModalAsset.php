<?php

namespace ravesoft\media\assets;

use yii\web\AssetBundle;

class ModalAsset extends AssetBundle
{
    public $sourcePath = '@vendor/rudderrave/yii2-yee-media/assets/source';
    public $css = [
        'css/modal.css',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}