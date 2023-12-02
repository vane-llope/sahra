<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class UserEvent extends Model
{
    use HasFactory;
    use uuid;

    protected $fillable = [
        'user_id',
        'event_id'
    ];
}
