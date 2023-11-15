<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $type
 * @property string $date
 * @property string $due
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $status
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
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
            [['type', 'date', 'due'], 'required'],
            [['type', 'created_by', 'status'], 'integer'],
            [['date', 'due', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'date' => 'Date',
            'due' => 'Due',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }
}
