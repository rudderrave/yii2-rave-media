<?php

namespace ravesoft\media\controllers;

use ravesoft\controllers\admin\BaseController;

/**
 * CategoryController implements the CRUD actions for ravesoft\media\models\Category model.
 */
class CategoryController extends BaseController
{
    public $modelClass = 'ravesoft\media\models\Category';
    public $modelSearchClass = 'ravesoft\media\models\CategorySearch';
    public $disabledActions = ['view', 'bulk-activate', 'bulk-deactivate'];

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}