<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'introduction',
        'image',
        'description',
        'tags',
        'type',
    ];

    public function scopeFilter($quary , array $filters){
        if($filters['tag'] ?? false){
           $quary->where('tags','like','%'.request('tag').'%');
       }
       if($filters['search'] ?? false){
        $quary->where('introduction','like','%'.request('search').'%');
    }}
}
