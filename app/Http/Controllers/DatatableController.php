<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datatable;
use Yajra\DataTables\Facades\DataTables;

class DatatableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Datatable::with('role');

            return DataTables::of($data)
                ->filterColumn('role.name', function($query, $keyword) {
                    $query->whereHas('role', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    });
                })
                ->make(true);
        }

        return view('datatables');
    }
}
