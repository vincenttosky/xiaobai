<?php
namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * Upload model
 *
 * @property integer $id
 * @property integer $type
 * @property string $url
 * @property string $note
 */
class Upload extends ActiveRecord
{

    public $uploadFile;

    /**
     * @inheritdocgetSoftTypeName
     */
    public static function tableName()
    {
        return '{{%upload}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['type', 'required'],
            [['uploadFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, exe', 'maxSize' => 512*1024*1024],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = '/uploads/' . $this->uploadFile->baseName . '.' . $this->uploadFile->extension;
            $this->url = Url::home(true) . $path;
            $this->uploadFile->saveAs(Yii::$app->basePath . '/web/' . $path);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'url' => Yii::t('app', 'URL'),
            'note' => Yii::t('app', 'Note'),
            'uploadFile' => Yii::t('app', 'Upload File'),

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
            'admin-create' => ['type', 'url', 'note'],
            'admin-update' => ['type', 'url', 'note']
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

    public function getUploadTypeName() {
        if ($this->type == 0) 
            return '软件';
        else if ($this->type == 1)
            return '图片';
        return '';
    }

}

