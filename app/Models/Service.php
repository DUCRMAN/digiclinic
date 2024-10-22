<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $table ='services';

    protected $fillable = [
        'code_serve',
        'libelle',
        'telephone',
        'email',
        'status',
        'room_number',
        'specialite',
    'chief_service_id'    ];

    public function chef()
    {
        return $this->belongsTo(User::class,  'chief_service_id');
    }
}