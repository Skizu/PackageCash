<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'amount'];

    public function envelope()
    {
        return $this->belongsTo(Envelope::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
