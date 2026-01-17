<?php

namespace App\Repositories;

use App\Models\Commodity;

class CommodityRepository
{
    public function getCommodityOrderBy($column, $direction = 'asc')
    {
        return Commodity::with('commodity_categories', 'commodity_locations', 'users')->orderBy($column, $direction);
    }

    public function store($request)
    {
        $commodity = new Commodity();
        $commodity->user_id = $request->user_id;
        $commodity->commodity_category_id = $request->commodity_category_id;
        $commodity->commodity_location_id = $request->commodity_location_id;
        $commodity->name = $request->name;
        $commodity->condition = $request->condition;
        $commodity->save();
    }

    public function commodityFind($id)
    {
        return Commodity::findOrFail($id);
    }

    public function update($request, $id)
    {
        $commodity = $this->commodityFind($id);
        $commodity->user_id = $request->user_id;
        $commodity->commodity_category_id = $request->commodity_category_id;
        $commodity->commodity_location_id = $request->commodity_location_id;
        $commodity->name = $request->name;
        $commodity->condition = $request->condition;
        $commodity->save();
    }
}
