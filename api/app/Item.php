<?php
namespace App;

use Franzose\ClosureTable\Models\Entity;

class Item extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * ClosureTable model instance.
     *
     * @var \App\ItemClosure
     */
    protected $closure = 'App\ItemClosure';
}
