<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Image\Image;
  
class ImageController extends Controller
{

    public function index(): View
    {
        return view('imageUpload');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $thumbnailName = time().'_thumb.'.$request->image->extension();

        $destinationPath = public_path('/images/');
        $request->image->move($destinationPath, $imageName);

        $destinationPathThumbnail = public_path('/images/');
        Image::load($destinationPath. $imageName)
                    ->resize(200, 150)
                    ->blur(20)
                    ->save($destinationPathThumbnail. $thumbnailName);

        return back()->with('success', 'You have successfully uploaded an image.')
                    ->with('imageName', $imageName)
                    ->with('thumbnailName', $thumbnailName);
    }
}
