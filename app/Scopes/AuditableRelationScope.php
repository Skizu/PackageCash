<?php

namespace App\Scopes;

use Auth;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AuditableRelationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return $this
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->whereRaw('? <@ json_array_int(data -> ?)', ['{' . Auth::user()->getAuditableId() . '}', 'AuditableID']);
    }
}