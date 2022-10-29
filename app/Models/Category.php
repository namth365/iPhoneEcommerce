<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
     }
 
     public function childrens() {
         return $this->hasMany(Category::class, 'parent_id');
     }
 
     public function getParentNameAttribute() {
         return optional($this->parent)->name;
     }
 
     public function getParents() {
         return Category::whereNull('parent_id')->with('childrens')->get(['id', 'name']);
     }
}
