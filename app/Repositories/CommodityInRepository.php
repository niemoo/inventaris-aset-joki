<?php

namespace App\Repositories;

use App\Models\CommodityIn;

class CommodityInRepository
{
    public function getCommodityInOrderBy($column, $direction = 'asc')
    {
        return CommodityIn::with('commodity', 'users')->orderBy($column, $direction);
    }

    // public function store($request)
    // {
    //     $commodityIn = new CommodityIn();
    //     $commodityIn->commodity_id = $request->commodity_id;
    //     $commodityIn->user_id = $request->user_id;
    //     $commodityIn->amount = $request->amount;
    //     $commodityIn->date_in = $request->date_in;
    //     $commodityIn->save();
    // }

    public function store($request)
    {
        $commodityIn = CommodityIn::where('commodity_id', $request->commodity_id)
            ->whereDate('date_in', $request->date_in)
            ->first();

        if ($commodityIn) {
            // Kalau sudah ada, tambahkan jumlahnya
            $commodityIn->amount += $request->amount;
        } else {
            // Kalau belum ada, buat baru
            $commodityIn = new CommodityIn();
            $commodityIn->commodity_id = $request->commodity_id;
            $commodityIn->user_id = $request->user_id;
            $commodityIn->amount = $request->amount;
            $commodityIn->date_in = $request->date_in;
        }

        $commodityIn->save();
    }

    public function commodityInFind($id)
    {
        return CommodityIn::findOrFail($id);
    }

    // public function update($request, $id)
    // {
    //     $commodityIn = $this->commodityInFind($id);
    //     $commodityIn->commodity_id = $request->commodity_id;
    //     $commodityIn->user_id = $request->user_id;
    //     $commodityIn->amount = $request->amount;
    //     $commodityIn->date_in = $request->date_in;
    //     $commodityIn->save();
    // }

    public function update($request, $id)
    {
        // Kalau update, biasanya kita update record yang sudah ada.
        // Tapi kalau kamu ingin logikanya sama (merge data by commodity_id + date_in), bisa:
        $existing = CommodityIn::where('commodity_id', $request->commodity_id)
            ->whereDate('date_in', $request->date_in)
            ->where('id', '!=', $id) // supaya gak bentrok dengan data yang sedang diupdate
            ->first();

        if ($existing) {
            // Tambahkan amount ke record existing
            $existing->amount += $request->amount;
            $existing->save();

            // Hapus record lama karena sudah digabung
            $this->commodityInFind($id)->delete();

            return $existing;
        } else {
            // Update normal
            $commodityIn = $this->commodityInFind($id);
            $commodityIn->commodity_id = $request->commodity_id;
            $commodityIn->user_id = $request->user_id;
            $commodityIn->amount = $request->amount;
            $commodityIn->date_in = $request->date_in;
            $commodityIn->save();

            return $commodityIn;
        }
    }

}