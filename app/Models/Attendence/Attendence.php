<?php

namespace App\Models\Attendence;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_working_hour'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
