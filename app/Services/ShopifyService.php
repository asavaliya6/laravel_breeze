<?php
  
namespace App\Services;
  
use App\Interfaces\PostInterface;
   
class ShopifyService implements PostInterface
{

    public function publishPost($title, $content) {
        info("Publish post in Shopify");
    }
      
    public function getPostDetails($postId) {
        info("Get post details from Shopify");
    }
}
