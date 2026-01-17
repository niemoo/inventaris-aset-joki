<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use HasFactory, SoftDeletes;

    public function commodity_categories()
    {
        return $this->belongsTo(CommodityCategory::class, 'commodity_category_id');
    }

    public function commodity_locations()
    {
        return $this->belongsTo(CommodityLocation::class, 'commodity_location_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
