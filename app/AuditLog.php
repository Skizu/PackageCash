<?php

namespace App;

use App\Domain\Audit\ViewParser;
use App\Domain\ObjectHasStateMachine;
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

    public static function whereAuditableID($value, $limit)
    {
        return static::whereContains('AuditableID', $value, $limit);
    }

    public static function whereContains($key, $value, $limit)
    {
        // TODO: restrict users
        return static::whereRaw('? <@ json_array_int(data -> ?)', ['{' . $value . '}', $key])->take($limit);
    }

    public function view() {
        return new ViewParser($this);
    }
}