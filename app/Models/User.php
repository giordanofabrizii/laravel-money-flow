<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactions() // one to many relation
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * return the income of the given month and year
     *
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getMonthIncome($year, $month)
    {
        $income = $this->transactions()
            ->where('type',1)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');

        return $income;
    }


    /**
     * return the outcome of the given month and year
     *
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getMonthOutcome($year, $month)
    {
        $outcome = $this->transactions()
            ->where('type',2)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');

        return $outcome;
    }
}
