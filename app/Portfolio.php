<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryPortfolio;

class Portfolio extends Model
{
    //
    protected $guarded = [];
    protected $with = ['categories'];

    public function categories() {
        return $this->hasMany(CategoryPortfolio::class);
    }

    public function gallery() {
        return $this->hasMany(Gallery::class);
    }

}
