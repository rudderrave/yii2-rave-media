<?php

use ravesoft\grid\GridPageSize;
use ravesoft\grid\GridView;
use ravesoft\helpers\Html;
use ravesoft\media\models\Category;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel ravesoft\media\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rave/media', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Media'), 'url' => ['/media/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/media', 'Albums'), 'url' => ['/media/album/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="media-category-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('rave', 'Add New'), ['/media/category/create'], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('rave/media', 'Manage Albums'), ['/media/album/index'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'media-category-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'media-category-grid-pjax']) ?>

            <?= GridView::widget([
                'id' => 'media-category-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'media-category-grid',
                    'actions' => [Url::to(['bulk-delete']) => Yii::t('rave', 'Delete')]
                ],
                'columns' => [
                    ['class' => 'ravesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'ravesoft\grid\columns\TitleActionColumn',
                        'controller' => '/media/category',
                        'title' => function (Category $model) {
                            return Html::a($model->title, ['/media/category/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    'description:ntext',
                    [
                        'class' => 'ravesoft\grid\columns\StatusColumn',
                        'attribute' => 'visible',
                    ],
                ],
            ]); ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>