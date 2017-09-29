<?php

namespace App;

use App\Notifications\EmployerResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employer extends Authenticatable
{
    use Notifiable;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployerResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'companyname' , 'email', 'password', 'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function jobcategory() {
        return $this->belongsTo(JobCategory::class, 'jobCategoryId');
    }

    public function vacancy() {
        return $this->hasMany(Vacancy::class, 'employers_id');
    }

    public function questionnaire() {
        return $this->hasMany(Questionnaire::class, 'employers_id');
    }
}
