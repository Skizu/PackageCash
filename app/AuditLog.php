<?php

namespace App;

use App\Domain\Audit\ViewParser;
use App\Domain\ObjectHasStateMachine;
use App\Scopes\AuditableRelationScope;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'audit_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['data'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'object',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AuditableRelationScope());
    }


    /**
     * Scope a query to filter by int in json int array.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $key
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereContains($query, $key, $value)
    {
        return $query->whereRaw('? <@ json_array_int(data -> ?)', ['{' . $value . '}', $key]);
    }

    public function view()
    {
        return new ViewParser($this);
    }
}