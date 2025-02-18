<?php

namespace App\Interfaces;

interface PostInterface
{
    public function publishPost($title, $content);
    public function getPostDetails($postId);
}
