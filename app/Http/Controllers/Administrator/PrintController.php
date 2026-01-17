<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\CommodityIn;
use App\Models\CommodityOut;
use Illuminate\Http\Request;
use App\Models\Commodity;

class PrintController extends Controller
{
    public function printByYear($year)
    {
        $commodities = Commodity::with('commodity_categories', 'commodity_locations')->whereYear('register_date', $year)->orderBy('name', 'asc')->get();

        return view('administrator.reports.print', compact('commodities', 'year'));
    }

    public function CommodityInPrintByDateRange(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date   = $request->query('end_date');

        if (!$start_date || !$end_date) {
            return redirect()->back()->with('error', 'Tanggal mulai dan selesai wajib diisi');
        }

        $commodities = CommodityIn::with([
                'commodity.commodity_categories',
                'commodity.commodity_locations',
                'users'
            ])
            ->whereBetween('date_in', [$start_date, $end_date])
            ->orderBy('date_in', 'asc')
            ->get();

        return view('administrator.commodities_in.print', compact('commodities', 'start_date', 'end_date'));
    }

    public function CommodityOutPrintByDateRange(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date   = $request->query('end_date');

        if (!$start_date || !$end_date) {
            return redirect()->back()->with('error', 'Tanggal mulai dan selesai wajib diisi');
        }

        $commodities = CommodityOut::with([
                'commodity.commodity_categories',
                'commodity.commodity_locations',
                'users'
            ])
            ->whereBetween('date_out', [$start_date, $end_date])
            ->orderBy('date_out', 'asc')
            ->get();

        return view('administrator.commodities_out.print', compact('commodities', 'start_date', 'end_date'));
    }
}
