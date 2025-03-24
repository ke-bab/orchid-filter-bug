<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;

class IsPrivateFilter extends Filter
{

    public function parameters(): array
    {
        return ['filter.is_private'];
    }

    public function run(Builder $builder): Builder
    {
        $value = $this->request->input('filter.is_private');

        if ($value === 'yes') {
            return $builder->where('is_private', 1);
        }

        if ($value === 'no') {
            return $builder->where('is_private', 0);
        }

        return $builder;
    }

}
