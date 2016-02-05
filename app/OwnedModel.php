<?php

namespace App;

use App\Scopes\OwnerScope;
use Illuminate\Database\Eloquent\Model;

abstract class OwnedModel extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OwnerScope());
    }
}
