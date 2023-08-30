<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consulta extends Model
{
    public static function list(string $nameTable): \Illuminate\Support\Collection
    {
        return DB::table($nameTable)->get();
    }

    public static function insertLine(string $nameTable, array $newData): void
    {
        DB::table($nameTable)->insert($newData);
    }

    public static function deleteLine(int $ID, string $nameTable): void
    {
        DB::table($nameTable)->where('id', $ID)->delete();
    }

    public static function editLine(int $ID, string $nameTable, array $newData): void
    {
        DB::table($nameTable)->where('id', $ID)->update($newData);
    }

    public static function findLine(string $nameTable, string $name): \Illuminate\Support\Collection
    {
        return DB::table($nameTable)->where('nome', 'LIKE', '%' . $name . '%')->get();
    }
}
