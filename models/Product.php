<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int $updated_by
 * @property string|null $code
 * @property string $name
 * @property string|null $material
 * @property int $categorie_id
 * @property string $cost
 * @property string $price
 * @property string $quantity
 * @property string $unit
 * @property string $rental
 * @property int $tax_id
 * @property int $supplier_id
 * @property string $supplier_cost
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
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
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'categorie_id', 'tax_id', 'supplier_id'], 'integer'],
            [[ 'name', 'categorie_id', 'cost', 'price', 'quantity', 'unit', 'rental', 'tax_id', 'supplier_id', 'supplier_cost'], 'required'],
            [['code', 'name', 'material', 'cost', 'price', 'quantity', 'unit', 'rental', 'supplier_cost','sale'], 'string', 'max' => 255],
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
            'updated_by' => 'Updated By',
            'code' => 'Product Code',
            'name' => 'Product Name',
            'material' => 'Material Type',
            'categorie_id' => 'Product Category',
            'cost' => 'Cost',
            'price' => 'Price',
            'quantity' => 'QTY',
            'unit' => 'Unit',
            'sale'=>'Sale',
            'rental' => 'Rental Tax',
            'tax_id' => 'Tax Method',
            'supplier_id' => 'Supplier',
            'supplier_cost' => 'Supplier Cost',
        ];
    }

    public function getCategory()
{
    return $this->hasOne(Category::class, ['id' => 'categorie_id']);
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
