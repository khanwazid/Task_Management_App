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
        'taskimage',
    ];
  
    public function getProgressPercentage()
{
    return match($this->status) {
        'pending' => 0,
        'in_progress' => 50,
        'completed' => 100,
        default => 0
    };
}

   
    
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
