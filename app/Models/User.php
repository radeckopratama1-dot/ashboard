<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
        'smoke_free_days',
        'daily_target',
        'cost_savings',
        'cigs_avoided',
        'therapy_phase',
        'screening_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'smoke_free_days' => 'integer',
            'cost_savings' => 'integer',
            'cigs_avoided' => 'integer',
        ];
    }

    /**
     * Helper to get user initials.
     */
    public function getInitialsAttribute(): string
    {
        $nameParts = array_filter(explode(' ', trim($this->name)));
        if (count($nameParts) >= 2) {
            return strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1));
        }
        return strtoupper(substr($this->name, 0, 2));
    }
}
