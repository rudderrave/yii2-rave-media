<?php

namespace ravesoft\media\widgets\dashboard;

use ravesoft\media\models\Media as MediaModel;
use ravesoft\models\User;
use ravesoft\widgets\DashboardWidget;

class Media extends DashboardWidget
{
    /**
     * Most recent post limit
     */
    public $recentLimit = 5;

    /**
     * Post index action
     */
    public $indexAction = 'media/default/index';

    public function run()
    {
        if (User::hasPermission('viewMedia')) {
            $recent = MediaModel::find()->orderBy(['id' => SORT_DESC])->limit($this->recentLimit)->all();

            return $this->render('media',
                [
                    'height' => $this->height,
                    'width' => $this->width,
                    'position' => $this->position,
                    'recent' => $recent,
                ]);
        }
    }
}