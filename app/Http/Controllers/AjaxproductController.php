<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajaxproduct;
use DataTables;
use Illuminate\Http\JsonResponse;

class AjaxproductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ajaxproduct::all();

            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="View" class="me-1 btn btn-info btn-sm showAjaxproduct"> View</a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editAjaxproduct"> Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteAjaxproduct"> Delete</a>';
                    return $btn;
                })
                ->make(true);
        }
        
        return view('ajaxproducts');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        Ajaxproduct::updateOrCreate([
            'id' => $request->ajaxproduct_id
        ], [
            'name' => $request->name, 
            'detail' => $request->detail
        ]);
        
        return response()->json(['success' => 'Ajaxproduct saved successfully.']);
    }

    public function show($id): JsonResponse
    {
        $ajaxproduct = Ajaxproduct::find($id);
        return response()->json($ajaxproduct);
    }

    public function edit($id): JsonResponse
    {
        $ajaxproduct = Ajaxproduct::find($id);
        return response()->json($ajaxproduct);
    }

    public function destroy($id): JsonResponse
    {
        Ajaxproduct::find($id)->delete();
        
        return response()->json(['success' => 'Ajaxproduct deleted successfully.']);
    }
}
