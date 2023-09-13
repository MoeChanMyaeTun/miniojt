<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Franzose\ClosureTable\Models\Entity;

class Item extends Entity implements ItemInterface
{
    protected $table = 'items';
    protected $img = [
        'image_path' => 'array',
    ];
    protected $closure = 'App\Models\ItemClosure';
}
