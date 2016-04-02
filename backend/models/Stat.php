<?php
namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * Stat model
 *
 * @property integer $id
 * @property string $mac
 * @property string $channel
 * @property string $version
 * @property string $oper
 * @property string $bdict
 */
class Stat extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mac' => Yii::t('app', 'Mac'),
            'channel' => Yii::t('app', 'Channel'),
            'version' => Yii::t('app', 'Version'),
            'oper' => Yii::t('app', 'Oper'),
            'bdict' => Yii::t('app', 'Bdict'),

            'created_at' => Yii::t('app', 'Created At'),
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
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
            'admin-create' => ['mac', 'channel', 'version', 'oper', 'bdict'],
            'admin-update' => ['mac', 'channel', 'version', 'oper', 'bdict']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

}

