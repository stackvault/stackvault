<?php

namespace App;

use App\Events\PageCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;

class Page extends Model
{
    use Notifiable;
    protected $table = 'pagespeed_pages';
    const CREATED_AT = 'date_added';
    const UPDATED_AT = null;
    const DELETED_AT = 'date_deleted';

    public $timestamps = true;

    protected $dates = [
        'date_added',
        'date_email_confirmed',
        'date_unsubscribed',
        'date_deleted',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function scopeSubscribed($query)
    {
        return $query
            ->where('date_email_confirmed', '>', '0')
            ->where('date_unsubscribed', null)
            ->wher('date_deleted', null);
    }

    public function verified()
    {
        return (bool) $this->date_email_confirmed;
    }

    public function isSubscribed()
    {
        return ($this->date_email_confirmed && !$this->date_unsubscribed && !$this->date_deleted);
    }

    public function verificationCodes()
    {
        return $this->hasMany(EmailVerificationCode::class);
    }

}
