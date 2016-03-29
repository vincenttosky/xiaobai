<?php
namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Software model
 *
 * @property integer $id
 * @property string $download_url
 * @property string $img_url
 * @property string $title
 * @property string $desc
 * @property bool $is_nav
 * @property string $size
 * @property string $renqi
 * @property string $language
 * @property string $level
 */
class Software extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%software}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['download_url', 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'soft_type' => Yii::t('app', 'Soft Type'),
            'download_url' => Yii::t('app', 'Download URL'),
            'img_url' => Yii::t('app', 'Image URL'),
            'title' => Yii::t('app', 'Title'),
            'desc' => Yii::t('app', 'Desc'),
            'size' => Yii::t('app', 'Size'),
            'renqi' => Yii::t('app', 'Renqi'),
            'language' => Yii::t('app', 'Language'),
            'level' => Yii::t('app', 'Level'),

            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'create_user_id' => Yii::t('app', 'Create User Id'),
            'update_user_id' => Yii::t('app', 'Update User Id'),
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'admin-create' => ['soft_type', 'download_url', 'img_url', 'title', 'desc', 'size', 'renqi', 'language', 'level'],
            'admin-update' => ['soft_type', 'download_url', 'img_url', 'title', 'desc', 'size', 'renqi', 'language', 'level']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentities($ids)
    {
        return static::findAll($ids);
    }

    public function getSoftTypeName() {
        if ($this->soft_type == 0) 
            return '广告软件';
        else if ($this->soft_type == 1)
            return '主软件';
        else if ($this->soft_type == 2)
            return '游戏';
        else if ($this->soft_type == 3)
            return '导航';
    }

}

