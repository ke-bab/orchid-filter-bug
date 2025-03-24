<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;

class ShowFilter extends Filter
{

    public function parameters(): array
    {
        return ['filter.show'];
    }

    public function run(Builder $builder): Builder
    {
        $value = $this->request->input('filter.show');

        if ($value === 'yes') {
            return $builder->where('show', 1);
        }

        if ($value === 'no') {
            return $builder->where('show', 0);
        }

        return $builder;
    }

}
