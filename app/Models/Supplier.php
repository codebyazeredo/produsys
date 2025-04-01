<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj',
        'address',
        'phone',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCnpjAttribute($value)
    {
        return strtoupper($value);
    }

    public function getAddressAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPhoneAttribute($value)
    {
        return preg_replace('/\D/', '', $value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(trim($value));
    }

    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] = strtoupper(trim($value));
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucfirst(trim($value));
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/\D/', '', trim($value));
    }
}
