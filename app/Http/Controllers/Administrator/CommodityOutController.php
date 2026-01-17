<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityOutRequest;
use App\Http\Requests\UpdateCommodityOutRequest;
use App\Repositories\CommodityOutRepository;
use App\Repositories\CommodityRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CommodityOutController extends Controller
{
    private $commodityOutRepository,$commodityRepository,$userRepository;


    public function __construct(CommodityOutRepository $commodityOutRepository, CommodityRepository $commodityRepository, UserRepository $userRepository)
    {
        $this->commodityOutRepository = $commodityOutRepository;
        $this->commodityRepository = $commodityRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.commodities_out.index', [
            'commodityOuts' => $this->commodityOutRepository->getCommodityOutOrderBy('created_at', 'desc')->paginate(10),
            'commodities' => $this->commodityRepository->getCommodityOrderBy('name')->get(),
            'users' => $this->userRepository->getUserOrderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityOutRequest $request)
    {
        $this->commodityOutRepository->store($request);

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Data barang keluar berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.commodities_out.edit', [
            'commodityOut' => $this->commodityOutRepository->commodityOutFind($id),
            'commodities' => $this->commodityRepository->getCommodityOrderBy('name')->get(),
            'users' => $this->userRepository->getUserOrderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommodityOutRequest $request, $id)
    {
        $this->commodityOutRepository->update($request, $id);

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Data barang keluar berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commodityOut = $this->commodityOutRepository->commodityOutFind($id)->delete();

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Data barang keluar berhasil dihapus!');
    }
}
