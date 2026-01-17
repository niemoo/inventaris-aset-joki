<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommodityCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasOne(Commodity::class);
    }

    public function commodity_updates()
    {
        return $this->hasOne(CommodityUpdate::class);
    }
}
