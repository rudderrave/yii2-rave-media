<?php

namespace ravesoft\media\assets;

use yii\web\AssetBundle;

class MediaAsset extends AssetBundle
{
    public $sourcePath = '@vendor/rudderrave/yii2-rave-media/assets/source';
    public $css = [
        'css/media.css',
    ];
    public $js = [
        'js/media.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
