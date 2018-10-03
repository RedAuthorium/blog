<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['address', 'contact_phone', 'contact_email', 'site_name'];
}
