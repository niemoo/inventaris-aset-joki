<?php

namespace App\Repositories;

use App\Models\CommodityOut;

class CommodityOutRepository
{
    public function getCommodityOutOrderBy($column, $direction = 'asc')
    {
        return CommodityOut::with('commodity', 'users')->orderBy($column, $direction);
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
        $commodityOut = CommodityOut::where('commodity_id', $request->commodity_id)
            ->whereDate('date_out', $request->date_out)
            ->first();

        if ($commodityOut) {
            // Kalau sudah ada, tambahkan jumlahnya
            $commodityOut->amount += $request->amount;
        } else {
            // Kalau belum ada, buat baru
            $commodityOut = new CommodityOut();
            $commodityOut->commodity_id = $request->commodity_id;
            $commodityOut->user_id = $request->user_id;
            $commodityOut->amount = $request->amount;
            $commodityOut->date_out = $request->date_out;
        }

        $commodityOut->save();
    }

    public function commodityOutFind($id)
    {
        return CommodityOut::findOrFail($id);
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
        $existing = CommodityOut::where('commodity_id', $request->commodity_id)
            ->whereDate('date_out', $request->date_out)
            ->where('id', '!=', $id) // supaya gak bentrok dengan data yang sedang diupdate
            ->first();

        if ($existing) {
            // Tambahkan amount ke record existing
            $existing->amount += $request->amount;
            $existing->save();

            // Hapus record lama karena sudah digabung
            $this->commodityOutFind($id)->delete();

            return $existing;
        } else {
            // Update normal
            $commodityOut = $this->commodityOutFind($id);
            $commodityOut->commodity_id = $request->commodity_id;
            $commodityOut->user_id = $request->user_id;
            $commodityOut->amount = $request->amount;
            $commodityOut->date_out = $request->date_out;
            $commodityOut->save();

            return $commodityOut;
        }
    }

}