<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'project_id',
        'deadline',
        'status'
    ];
    public const STATUS = ['open', 'in progress', 'pending', 'waiting client', 'blocked', 'closed'];

    public function project()
    {

        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function client()
    {

        return $this->belongsTo(Client::class);
    }
}