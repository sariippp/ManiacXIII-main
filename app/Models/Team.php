<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_name',
        'school_address',
        'school_number',
        'status'
    ];

    public function participants() : HasMany {
        return $this->hasMany(Participant::class, 'team_id');
    }

    public function message() : HasOne {
        return $this->hasOne(Message::class, 'team_id');
    }
}
