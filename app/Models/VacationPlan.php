<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationPlan extends Model
{
    use HasFactory;

    /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'vacation_plan';

    /**
     * The attributes that are mass assignable.
     *
     * These attributes can be filled in bulk via methods like `create` or `update`.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'date',
        'description',
        'locale',
        'user_id',
    ];

    /**
     * Get the user that owns the vacation plan.
     *
     * This method defines the inverse of the one-to-many relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
