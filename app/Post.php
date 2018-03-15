<?php

namespace App;

use App\Language;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = [
        'text','display_name','language_id'
    ];
    public function language() {
        return $this->hasOne(Language::class);
    }
}
