<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * Don't apply mass assignment
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Attribute casting
     *
     * @return void
     */
    protected $casts = [
        'fast_site' => 'integer'
    ];

    /**
     * It belongs to a user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
