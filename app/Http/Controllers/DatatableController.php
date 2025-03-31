<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datatable;
use DataTables;

class DatatableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Datatable::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
          
        return view('datatables');
    }
}
