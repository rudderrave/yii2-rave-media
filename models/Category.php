<?php

namespace ravesoft\media\models;

use omgdef\multilingual\MultilingualQuery;
use ravesoft\behaviors\MultilingualBehavior;
use ravesoft\models\OwnerAccess;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use ravesoft\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "media_category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property integer $visible
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Category extends ActiveRecord implements OwnerAccess
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%media_category}}';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->className() == Category::className()) {
            $this->visible = 1;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by', 'created_at', 'updated_at', 'visible'], 'integer'],
            [['description'], 'string'],
            [['slug', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'langForeignKey' => 'media_category_id',
                'tableName' => "{{%media_category_lang}}",
                'attributes' => [
                    'title', 'description',
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rave', 'ID'),
            'slug' => Yii::t('rave', 'Slug'),
            'title' => Yii::t('rave', 'Title'),
            'visible' => Yii::t('rave', 'Visible'),
            'description' => Yii::t('rave', 'Description'),
            'created_by' => Yii::t('rave', 'Created By'),
            'updated_by' => Yii::t('rave', 'Updated By'),
            'created_at' => Yii::t('rave', 'Created'),
            'updated_at' => Yii::t('rave', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['category_id' => 'id']);
    }

    /**
     * Return all categories.
     *
     * @param bool $asArray
     *
     * @return static[]
     */
    public static function getCategories($asArray = false)
    {
        $result = static::find()->all();
        return $asArray ? ArrayHelper::map($result, 'id', 'title') : $result;
    }

    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     *
     * @inheritdoc
     */
    public static function getFullAccessPermission()
    {
        return 'fullMediaCategoryAccess';
    }

    /**
     *
     * @inheritdoc
     */
    public static function getOwnerField()
    {
        return 'created_by';
    }
}