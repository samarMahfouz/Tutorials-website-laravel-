<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id', 'info', 'myfav', 'image', 'country', 'fullname', 'FB', 'TW', 'LN', 'BH'
    ];
    public function user() {
      return $this->belongsTo(User::class);
    }
}
