<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuidpost;

class UuidpostController extends Controller
{
    public function store(Request $request)
    {
        $uuidpost = Uuidpost::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'Uuidpost created successfully',
            'id' => $uuidpost->id
        ]);
    }

    public function show($uuid)
    {
        $uuidpost = Uuidpost::where('id', $uuid)->firstOrFail();
        return response()->json($uuidpost);
    }

    public function index()
    {
        return response()->json(Uuidpost::all());
    }

    public function update(Request $request, $uuid)
    {
        $uuidpost = Uuidpost::where('id', $uuid)->firstOrFail();
        $uuidpost->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Uuidpost updated successfully']);
    }

    public function destroy($uuid)
    {
        $uuidpost = Uuidpost::where('id', $uuid)->firstOrFail();
        $uuidpost->delete();

        return response()->json(['message' => 'Uuidpost deleted successfully']);
    }
}
