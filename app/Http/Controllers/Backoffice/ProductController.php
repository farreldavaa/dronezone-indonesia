<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest();

            return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn =
                "<td>
                    <button id='btn-edit' type='button' class='btn btn-sm icon btn-success' data-bs-toggle='modal' data-bs-target='#form-modal'  onclick='editData({$data->id})'><i class='bi bi-pencil'></i></button>
                    <button id='btn-delete' type='button' class='btn btn-sm icon btn-danger' data-bs-toggle='modal' data-bs-target='#form-modal' onclick='deleteData({$data->id})'><i class='bi bi-trash'></i></button>
                </td>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->toJson();
        }
        return view('backoffice.barang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = Product::create($request->all());
        return response()->json(['message' => 'Data Added successfully.', 'data' => $table]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = Product::find($id);
        return response()->json(['data' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = Product::find($id);
        return response()->json(['data' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $table = Product::find($id)->update($request->all());
        return response()->json(['message' => 'Data Updated successfully.', 'data' => $table]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return response()->json(['message' => 'Data Deleted successfully.']);
    }
}
