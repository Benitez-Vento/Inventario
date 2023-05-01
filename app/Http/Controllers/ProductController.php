<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Brand;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $produtos=Product::get();
            return Datatables::of($produtos)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"
                           data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"
                           data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('productos.index');
    }

    public function index2(Request $request)
    {
        //
        if ($request->ajax()) {
            $produtos=Product::get();
            return Datatables::of($produtos)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"
                           data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Seleccionar</a>';



                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('productos.index');
    }

    public function entrada()
    {
        //
        return view('productos.entrada');
    }


    public function salida()
    {
        //
        return view('productos.salida');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Product::updateOrCreate(['id' => $request->id],
        [
        'nombre' => $request->nombre,
        'imagenes' => $request->imagenes,
        'precio_venta' => $request->precio_venta,
        'stock' => $request->stock,
        'categorie_id' => $request->categorie_id,
        'brand_id' => $request->brand_id,
        ]);

        return response()->json(['success'=>'Post saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produtos = Product::find($id);
        return response()->json($produtos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);
    }
}
