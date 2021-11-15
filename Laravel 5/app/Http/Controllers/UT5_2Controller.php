<?php

namespace App\Http\Controllers;

use App\UT5_2;
use App\Pedido;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests\UT5_2Request;
use App\Http\Requests\contacto;

use Illuminate\Support\Facades\DB;

class UT5_2Controller extends Controller
{

    public function index()
    {
        $ut5_2=UT5_2::Paginate(10);
        return view("UT5_2.index",compact("ut5_2"));
    }


    public function create()
    {
        return view("UT5_2.create");
    }


    public function store(contacto $request)
    {
        $datos=$request->all();
        UT5_2::create($datos);
        return redirect('UT5_2');
    }


    public function show($id)
    {
        $ut5_2=UT5_2::find($id);
        return view("UT5_2.show",compact("ut5_2"));
    }


    public function edit($id)
    {
        $ut5_2=UT5_2::find($id);
        return view("UT5_2.edit",compact("ut5_2"));
    }

    public function update(contacto $request, $id)
    {
        $datos=$request->all();
		$ut5_2=UT5_2::find($id);
		$ut5_2->update($datos);
		return redirect('UT5_2');
    }

    public function destroy($id)
    {
        UT5_2::find($id)->delete();
        return redirect('UT5_2');
    }
	
	public function pdf($id)
    {
        $ut5_2=UT5_2::find($id);
		$pdf = PDF::loadView('UT5_2.pdf', $ut5_2);
		return $pdf->stream($ut5_2->IdProveedor . '.pdf');
    }
	
	public function productos($id)
	{
		$ut5_7=Pedido::where('proveedor_id', $id)->get();
		return view("UT5_7.index")->with('ut5_7', $ut5_7);;
	}
		
	public function contacto($id)
	{
		return Pedido::where('proveedor_id', $id)->get();
		
	}
}
