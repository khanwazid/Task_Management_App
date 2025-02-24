<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
    ];
  
    
   
    
    protected $dates = ['due_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notes()
{
    return $this->hasMany(TaskNote::class)->orderBy('created_at', 'desc');
}
public function reports()
{
    return $this->hasMany(Report::class);
}


}
