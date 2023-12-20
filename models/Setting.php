<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property string $comapny
 * @property string $logo
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $phone
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    public function behaviors(){
        return [
            TimestampBehavior::class,
            [
                'class'=>BlameableBehavior::class,
                'updatedByAttribute'=>false,
            ],
          
           
            
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_by'], 'integer'],
            [['comapny', 'logo', 'email', 'password', 'address', 'phone'], 'required'],
            [['comapny', 'email', 'password', 'address', 'phone','website'], 'string', 'max' => 255],
            [['logo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'comapny' => 'Comapny',
            'website'=>'Website',
            'logo' => 'Logo',
            'email' => 'Email',
            'password' => 'Password',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }
}
