<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_permission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
    
    // Dapatkan data role
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Dapatkan data permission
    public function permission(): BelongsTo {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
