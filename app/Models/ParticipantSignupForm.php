<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ParticipantSignupForm extends Model
{
    use HasUuids;

    protected $table = 'participant_sign_up_form';

    protected $guarded = ['id'];

    protected $casts = [
        'children_info' => 'array',
        'date' => 'date',
    ];

}
