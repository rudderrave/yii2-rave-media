<?php

use ravesoft\helpers\Html;
use ravesoft\media\models\Category;
use ravesoft\widgets\ActiveForm;
use ravesoft\widgets\LanguagePills;

/* @var $this yii\web\View */
/* @var $model ravesoft\media\models\Album */
/* @var $form ravesoft\widgets\ActiveForm */
?>

<div class="album-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'album-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?= $form->field($model, 'category_id')->dropDownList(Category::getCategories(true), ['prompt' => '']) ?>

                        <?= $form->field($model, 'visible')->checkbox() ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('rave', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('rave', 'Cancel'), ['/media/album/index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>
                                <?= Html::submitButton(Yii::t('rave', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('rave', 'Delete'), ['/media/album/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>