<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role'
    ];

    // Dapatkan users dari role
    public function users(): HasMany {
        return $this->hasMany(User::class, 'role_id');
    }

    // Dapatkan data pivot role_permission
    public function permission(): HasMany {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
}
