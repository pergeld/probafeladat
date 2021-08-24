<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function scopeFilter($query)
    {
        return $query->when(request()->input('statusfilter') && request()->input('statusfilter') != 'összes', function ($query){
            return $query->where('status', request()->input('statusfilter'));
        });
    }
}
