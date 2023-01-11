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

    protected $fillable = ['id', 'title', 'price'];

    public static function getAll()
    {
        $data = [
            ['id' => 1, 'title' => 'Áo nam', 'price' => 1],
            ['id' => 2, 'title' => 'Áo nữ', 'price' => 0],
            ['id' => 3, 'title' => 'Quần bò', 'price' => 0],
            ['id' => 4, 'title' => 'Túi xách', 'price' => 1],
            ['id' => 5, 'title' => 'Ví da', 'price' => 1],
            ['id' => 6, 'title' => 'Giày dép', 'price' => 1],
            ['id' => 7, 'title' => 'Dây lưng', 'price' => 1],
            ['id' => 8, 'title' => 'Đồng hồ', 'price' => 1]
        ];

        $resault = [];
        foreach ($data as $item) {
            $resault[] = (new static)->fill($item);
        }
        return collect($resault);
    }

    public static function paginate($perPage = 5, $page = null, $options = [])
    {
        $items = (new static)->getAll();
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }
}
