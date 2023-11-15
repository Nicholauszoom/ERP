<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "purch_detail".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int $purchase_id
 * @property int $item_id
 * @property int $quantity
 * @property string $unit_price
 * @property string $amount
 */
class Pdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purch_detail';
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
            [['created_at', 'updated_at', 'created_by', 'purchase_id', 'item_id'], 'integer'],
            [['purchase_id', 'item_id', 'quantity', 'unit_price', 'amount'], 'required'],
            [['unit_price', 'amount', 'quantity'], 'string', 'max' => 255],
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
            'purchase_id' => 'Purchase ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'amount' => 'Amount',
        ];
    }
}
