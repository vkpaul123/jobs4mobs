<?php

namespace App;

use App\Notifications\EmployerResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Employer extends Authenticatable
{
    use Notifiable;
    use Searchable;

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
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'employers';
    }

    public function toSearchableArray()
    {
        $employer = $this->toArray();

        if($this->address)
            $employer['address_id'] = $this->address->toArray();

        if($this->jobcategory)
            $employer['jobCategoryId'] = $this->jobcategory->name;

        return $employer;
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
        'password', 'remember_token', 'verifyToken',
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
