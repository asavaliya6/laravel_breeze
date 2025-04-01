<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MultipleimageController extends Controller
{
    public function index(): View
    {
        return view('Multipleimage');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];

        foreach($request->file('images') as $image) {

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $images[] = ['name' => $imageName];
        }

        foreach ($images as $imageData) {
            Image::create($imageData);
        }
        
        return back()->with('success', 'Images uploaded successfully!')
                     ->with('images', $images);
    }
}
