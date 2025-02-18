<?php
  
namespace App\Traits;
  
trait Sluggable
{
    public function generateSlug($string)
    {
        $slug = strtolower(str_replace(' ', '-', $string));
        $count = 1;
  
        while ($this->slugExists($slug)) {
            $slug = strtolower(str_replace(' ', '-', $string)) . '-' . $count;
            $count++;
        }
  
        return $slug;
    }

    protected function slugExists($slug)
    {
        return static::where('slug', $slug)->exists();
    }
}
