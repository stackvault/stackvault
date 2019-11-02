<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailVerificationCode extends Model
{
    protected $table = 'pagespeed_email_verification_codes';
    const CREATED_AT = 'date_added';
    const UPDATED_AT = null;
    const DELETED_AT = 'date_deleted';

    public $fillable = [
        'code'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function scopeActive($query)
    {
        return $query->where('date_added', '<', tap(new Carbon('now'))->addWeeks(2));
    }

    public static function createCode(): string
    {
        return Hash::make(Str::random(15));
    }
}
