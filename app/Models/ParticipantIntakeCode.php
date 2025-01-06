<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipantIntakeCode extends Model
{
    use HasUuids;

    protected $fillable = ['participant_id', 'code'];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code ??= static::generateCode();
        });
    }

    /**
     * Define the relationship to the Participant model.
     *
     * @return BelongsTo<Participant, self>
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    public static function generateCode(int $length = 5, ?string $possibleChars = null): string
    {
        // ambiguous characters have been removed
        $possibleChars ??= 'ABCDEFGHKLMNPRTUVWXYZ23456789';

        return substr(str_shuffle($possibleChars), 0, $length);
    }
}
