<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use App\Support\SaveModel\Fields\BooleanField;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Support\SaveModel\Fields\PasswordField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements SaveableInterface
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saveableFields()
    {
        return [
            'name' => StringField::new(),
            'email' => StringField::new(),
            'password' => PasswordField::new(),
            'status' => BooleanField::new(),
            'image' => FileField::new()->storeIn('images')->disk('uploads')
        ];
    }

    public function hero()
    {
        return $this->hasOne(Hero::class, 'user_id', 'id');
    }
    public function about()
    {
        return $this->hasOne(About::class, 'user_id', 'id');
    }
    public function interest()
    {
        return $this->hasOne(Interest::class, 'user_id', 'id');
    }
    public function fact()
    {
        return $this->hasOne(Fact::class, 'user_id', 'id');
    }
    public function service()
    {
        return $this->hasOne(Service::class, 'user_id', 'id');
    }
    public function resume()
    {
        return $this->hasOne(Resume::class, 'user_id', 'id');
    }
    public function expertise()
    {
        return $this->hasOne(Expertise::class, 'user_id', 'id');
    }
    public function portfolio()
    {
        return $this->hasOne(Portfolio::class, 'user_id', 'id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'user_id', 'id');
    }
    public function projects()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }
    public function settings()
    {
        return $this->hasOne(Setting::class, 'user_id', 'id');
    }
    public function contact()
    {
        return $this->hasOne(Contact::class, 'user_id', 'id');
    }
    public function clients()
    {
        return $this->hasOne(Client::class, 'user_id', 'id');
    }
}
