<?php

namespace App\Models;

use App\Models\User;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    
    protected $table ='services';

    protected $fillable = [
        'service',
        'specialite',
        'email',
        'telephone',
        'status',
        'chef_service'    
    ];

    public function chef()
    {
        return $this->belongsTo(Personnel::class,  'chef_service');
    }

}