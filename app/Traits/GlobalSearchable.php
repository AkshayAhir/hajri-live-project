<?php
namespace App\Traits;
use Illuminate\Support\Facades\Session;
trait GlobalSearchable
{
    public static function globalSearch($query)
    {
        $business_id = Session::get('business_id');

        return static::where('business_id', $business_id)
            ->where(function ($queryBuilder) use ($query) {
                $columns = isset(static::$globalSearchColumns) ? static::$globalSearchColumns : [];

                $queryBuilder->where(function ($subQueryBuilder) use ($columns, $query) {
                    foreach ($columns as $column) {
                        $subQueryBuilder->orWhere($column, 'LIKE', '%' . $query . '%');
                    }
                });
            })
            ->get();
    }
}