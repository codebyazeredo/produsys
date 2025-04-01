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

    public function getWarehouseId(): int
    {
        return $this->attributes['warehouse_id'];
    }

    public function setWarehouseId(int $warehouseId): void
    {
        $this->attributes['warehouse_id'] = $warehouseId;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }
}
