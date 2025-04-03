<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class QuillController extends Controller
{
    public function index(): View
    {
        return view('quill');
    }

    public function store(Request $request): JsonResponse
    {
        dd($request->all());
    }
}
