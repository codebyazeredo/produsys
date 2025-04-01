<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function getLocationAttribute($value)
    {
        return ucfirst($value);
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = ucfirst($value);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
