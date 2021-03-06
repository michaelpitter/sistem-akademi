<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query,array $filters){
        $query->when(
            $filters['search']??false,
            function ($query,$search){
                return $query->where('name','like','%'.$search.'%')
                    ->orWhere('nidn','like','%'.$search.'%');
            }
        );
        $query->when(
            $filters['orderBy']??false,
            function ($query,$sortBy){
                return $query->orderBy('created_at',$sortBy);
            }
        );
    }

}
