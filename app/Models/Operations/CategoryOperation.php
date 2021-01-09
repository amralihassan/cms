<?php

namespace App\Models\Operations;

use App\Models\Category;

class CategoryOperation extends Category
{
    public static function fetchAll()
    {
        return Category::all();
    }
}
