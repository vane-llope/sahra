<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    use Uuid;
    protected $fillable = ['name'];
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'entity_id');
    }
}
