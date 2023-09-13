<?php
namespace App\Models;

use Franzose\ClosureTable\Models\ClosureTable;

/**
 * ItemClosure
 */
class Itemclosure extends ClosureTable implements ItemClosureInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'itemclosure';
}

