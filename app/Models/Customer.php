<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'f_name',
        'l_name',
        'address',
        'phone_number',
        'gender'
    ];


    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

}
