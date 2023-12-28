<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int $product
 * @property string $price
 * @property string $quantity
 * @property string $amount
 * @property string $transport
 * @property string $expenses
 * @property int $tax_id
 * @property string $profit
 * @property string $sale
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
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
            [['created_at', 'updated_at', 'created_by', 'product', 'tax_id','supplier_id'], 'integer'],
            [['product', 'price', 'quantity', 'amount', 'transport', 'expenses', 'tax_id', 'profit', 'sale','supplier_id'], 'required'],
            [['price', 'quantity', 'amount', 'transport', 'expenses', 'profit', 'sale'], 'string', 'max' => 255],
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
            'product' => 'Product',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
            'transport' => 'Transport',
            'expenses' => 'Expenses',
            'tax_id' => 'Tax ID',
            'profit' => 'Profit',
            'sale' => 'Sale',
            'supplier_id' => 'Supplier',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product']);
    }
    
    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, ['id' => 'supplier_id']);
    }
    public function getTax()
    {
        return $this->hasOne(Tax::class, ['id' => 'tax_id']);
    }
}
