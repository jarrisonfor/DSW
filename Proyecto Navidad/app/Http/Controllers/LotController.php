<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\LotRequest as CreateLotRequest;
use App\Http\Requests\Update\LotRequest as UpdateLotRequest;
use App\Models\Lot;
use App\Models\Product;
use Illuminate\Http\Request;

class LotController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lots = Lot::where('product_id', $request->product_id)->orderBy('created_at', 'desc')->get();
        return view('lot.index', ['lots' => $lots, 'product' => Product::find($request->product_id)]);
    }

    public function indexJson(Request $request)
    {
        $lots = Lot::where('product_id', $request->product_id)->get();
        return $lots;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('lot.create', ['product' => Product::find($request->product_id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLotRequest $request)
    {
        Lot::create($request->validated());
        return redirect()->route('lot.index', ['product_id' => $request->product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        return view('lot.show', ['lot' => $lot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $lot, Request $request)
    {
        return view('lot.edit', ['lot' => $lot, 'product' => Product::find($request->product_id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $lot->update($request->validated());
        return redirect()->route('lot.index', ['product_id' => $request->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot, Request $request)
    {
        $lot->delete();
        return redirect()->route('lot.index', ['product_id' => $request->product_id]);
    }

}
