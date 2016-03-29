<?php
namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use backend\models\Software;
use yii\helpers\ArrayHelper;

/**
 * Software model
 *
 * @property integer $id
 * @property integer $main
 * @property integer $game
 * @property integer $right1
 * @property integer $right2
 * @property integer $right3
 * @property integer $right4
 * @property integer $below1
 * @property integer $below2
 * @property integer $after1
 * @property integer $after2
 * @property integer $after3
 */
class Source extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['main', 'required'],
            ['game', 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'main' => Yii::t('app', 'Main'),
            'game' => Yii::t('app', 'Game'),
            'right1' => Yii::t('app', 'Right1'),
            'right2' => Yii::t('app', 'Right2'),
            'right3' => Yii::t('app', 'Right3'),
            'right4' => Yii::t('app', 'Right4'),
            'below1' => Yii::t('app', 'Below1'),
            'below2' => Yii::t('app', 'Below2'),
            'after1' => Yii::t('app', 'After1'),
            'after2' => Yii::t('app', 'After2'),
            'after3' => Yii::t('app', 'After3'),

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
            'admin-create' => ['main', 'game', 'right1', 'right2', 'right3', 'right4', 'below1', 'below2', 'after1', 'after2', 'after3'],
            'admin-update' => ['main', 'game', 'right1', 'right2', 'right3', 'right4', 'below1', 'below2', 'after1', 'after2', 'after3']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function getMainSofts()
    {
        return ArrayHelper::map(Software::find()->where(['soft_type' => 1])->all(), 'id', 'id');
    }

    public static function getGameSofts()
    {
        return ArrayHelper::map(Software::find()->where(['soft_type' => 2])->all(), 'id', 'id');
    }

}

