<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Services\WordpressService;
  
class WordpressPostController extends Controller
{
    protected $wordpressService;
    
    public function __construct(WordpressService $wordpressService) {
        $this->wordpressService = $wordpressService;
    }
      
    public function index(Request $request) {
          
        $this->wordpressService->publishPost('This is title.', 'This is body.');
          
        return response()->json(['message' => 'Post published successfully']);
    }
}
