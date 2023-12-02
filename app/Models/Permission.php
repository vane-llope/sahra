<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use Uuid;
    protected $fillable = ['create', 'update', 'remove', 'display', 'role_id', 'entity_id'];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }
}
