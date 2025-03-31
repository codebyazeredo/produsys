<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'name',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }
}
