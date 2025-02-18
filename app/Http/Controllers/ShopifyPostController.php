<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Services\ShopifyService;
   
class ShopifyPostController extends Controller
{
    protected $shopifyService;
      
    public function __construct(ShopifyService $shopifyService) {
        $this->shopifyService = $shopifyService;
    }
      
    public function index(Request $request) {
          
        $this->shopifyService->publishPost('This is title.', 'This is body.');
           
        return response()->json(['message' => 'Post published successfully']);
    }
}
