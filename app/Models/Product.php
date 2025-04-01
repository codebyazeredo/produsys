<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'unit_measure_id',
        'price',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPriceAttribute($value)
    {
        return (float) $value;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'Não definido';
    }

    public function getUnitMeasureNameAttribute()
    {
        return $this->unitMeasure->name ?? 'Não definido';
    }

    public function getCategoryIdAttribute($value)
    {
        return (int) $value;
    }

    public function getSupplierIdAttribute($value)
    {
        return (int) $value;
    }

    public function getUnitMeasureIdAttribute($value)
    {
        return (int) $value;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(trim($value));
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = round($value, 2);
    }

    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = (int) $value;
    }

    public function setSupplierIdAttribute($value)
    {
        $this->attributes['supplier_id'] = (int) $value;
    }

    public function setUnitMeasureIdAttribute($value)
    {
        $this->attributes['unit_measure_id'] = (int) $value;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unitMeasure()
    {
        return $this->belongsTo(UnitMeasure::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function latestStockMovement()
    {
        return $this->hasOne(StockMovement::class)->latest('movement_date');
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }
}
