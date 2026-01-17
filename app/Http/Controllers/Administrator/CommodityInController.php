<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityInRequest;
use App\Http\Requests\UpdateCommodityInRequest;
use App\Repositories\CommodityInRepository;
use App\Repositories\CommodityRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CommodityInController extends Controller
{
    private $commodityInRepository,$commodityRepository,$userRepository;
        
    public function __construct(CommodityInRepository $commodityInRepository, CommodityRepository $commodityRepository, UserRepository $userRepository)
    {
        $this->commodityInRepository = $commodityInRepository;
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
        return view('administrator.commodities_in.index', [
            'commodityIns' => $this->commodityInRepository->getCommodityInOrderBy('created_at', 'desc')->paginate(10),
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
    public function store(StoreCommodityInRequest $request)
    {
        $this->commodityInRepository->store($request);

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Data barang masuk berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.commodities_in.edit', [
            'commodityIn' => $this->commodityInRepository->commodityInFind($id),
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
    public function update(UpdateCommodityInRequest $request, $id)
    {
        $this->commodityInRepository->update($request, $id);

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Data barang masuk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commodityIn = $this->commodityInRepository->commodityInFind($id)->delete();

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Data barang masuk berhasil dihapus!');
    }
}