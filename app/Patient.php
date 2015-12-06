<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_data';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
