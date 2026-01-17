<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommodityOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'commodity_out';

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'commodity_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
