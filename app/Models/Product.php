<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'content', 'category_id', 'status'];

}
