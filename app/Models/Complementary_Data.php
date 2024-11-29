<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementary_Data extends Model
{
    use HasFactory;

    protected $table = 'complementary_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'study',
        'card',
        'company_id',
        'user_id',
    ];

    //Se relaciona la tabla con user_id
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
