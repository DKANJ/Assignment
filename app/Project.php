<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
//    protected $fillable = [
//        
//        'title', 'description'
//    
//    ];

    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    
    public function addTask($task)
    {
        $this->tasks()->create($task);
        
        
//        return Task::create([
//            'project_id' => $this->id, 
//            'description'=> $description
//        
//        ]);
    }
    
}
