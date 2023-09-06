<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentBuilderHelper
{
    public function filter(Builder $builder, array $params = []): LengthAwarePaginator
    {
        $builder = $this->filterBuilder($builder, $params);

        return $this->paginateBuilder($builder);
    }

    private function filterBuilder(Builder &$builder, array $params = []): Builder
    {
        $model = $builder->getModel();

        /**
         * Filter only column of the model table
         */
        $fields = array_intersect_key($params, array_flip($model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable())));

        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                $builder->orWhere(function ($query) use ($key, $value) {
                    foreach ($value as $singleValue) {
                        $query->orWhere($key, 'like', "%{$singleValue}%");
                    }
                });
            } else {
                $builder->where($key, 'like', "%{$value}%");
            }
        }

        return $builder;
    }

    private function paginateBuilder(Builder &$builder, array $params = []): LengthAwarePaginator
    {
        $builder->orderBy(
            $params['order_by'] ?? 'id',
            $params['sort_by'] ?? 'DESC',
        );

        return $builder->paginate(
            perPage: $params['per_page'] ?? 10,
            page: $params['page'] ?? 1,
        );
    }
}
