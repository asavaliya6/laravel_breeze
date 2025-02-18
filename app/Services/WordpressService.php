<?php
  
namespace App\Services;
  
use App\Interfaces\PostInterface;
  
class WordpressService implements PostInterface
{

    public function publishPost($title, $content) {
        info("Publish post in Wordpress");
    }

    public function getPostDetails($postId) {
        info("Get post details from Wordpress");
    }
}
