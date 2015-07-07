<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'amount'];

    public function source()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
