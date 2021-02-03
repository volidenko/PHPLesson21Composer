<?php

//namespace App\Models;
namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $primaryKey="id";
    protected $table="topics";
    protected $fillable=["topicname","create_at","update_at"];
}
