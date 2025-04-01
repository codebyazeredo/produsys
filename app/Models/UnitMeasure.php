<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasure extends Model
{
    use HasFactory;

    protected $table = 'unit_measures';

    protected $fillable = [
        'name',
        'abbreviation',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(trim($value));
    }

    public function setAbbreviationAttribute($value)
    {
        $this->attributes['abbreviation'] = strtoupper(trim($value));
    }
}
