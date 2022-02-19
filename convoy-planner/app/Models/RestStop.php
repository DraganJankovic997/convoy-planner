<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestStop extends Model
{
    use HasFactory;

    protected $table = 'reststops';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'address',
        'work_from',
        'work_to',
        'work_sunday',
        'work_saturday',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
