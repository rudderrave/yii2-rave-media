<?php

use ravesoft\grid\GridPageSize;
use ravesoft\grid\GridView;
use ravesoft\helpers\Html;
use ravesoft\media\models\Album;
use ravesoft\media\models\Category;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel ravesoft\media\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/media', 'Albums');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Media'), 'url' => ['/media/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/media/album/create'], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('yee/media', 'Manage Categories'), ['/media/category/index'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'album-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'album-grid-pjax']) ?>

            <?= GridView::widget([
                'id' => 'album-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'album-grid',
                    'actions' => [Url::to(['bulk-delete']) => Yii::t('yee', 'Delete')],
                ],
                'columns' => [
                    ['class' => 'ravesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'ravesoft\grid\columns\TitleActionColumn',
                        'controller' => '/media/album',
                        'title' => function (Album $model) {
                            return Html::a($model->title, ['/media/album/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    'description:ntext',
                    [
                        'attribute' => 'category_id',
                        'filter' => Category::getCategories(true),
                        'value' => function (Album $model) {
                            return ($model->category instanceof Category) ? $model->category->title : Yii::t('yii', '(not set)');
                        },
                        'format' => 'raw',
                    ],
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
