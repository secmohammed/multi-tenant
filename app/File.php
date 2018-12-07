<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use ForTenants;

    protected $fillable = [
        'name', 'path'
    ];
}
