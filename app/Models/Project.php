<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\DateField;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'projects';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'category_id'   => StringField::new(),
            'user_id'       => StringField::new(),
            'title_ar'      => StringField::new(),
            'title_en'      => StringField::new(),
            'desc_ar'       => StringField::new(),
            'desc_en'       => StringField::new(),
            'client_ar'     => StringField::new(),
            'client_en'     => StringField::new(),
            'subject_ar'    => StringField::new(),
            'subject_en'    => StringField::new(),
            'website'       => StringField::new(),
            'date'          => DateField::new(),
            'thumbnail'     => FileField::new()->storeIn('images')->disk('uploads'),
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function next($name)
    {
        $user_id = User::where('name', str_replace('-', ' ', $name))->first()->id;

        return $this->where('id', '>', $this->id)->where('user_id', $user_id)->orderBy('id', 'asc')->first();
    }
    public  function previous($name)
    {
        $user_id = User::where('name', str_replace('-', ' ', $name))->first()->id;

        return $this->where('id', '<', $this->id)->where('user_id', $user_id)->orderBy('id', 'desc')->first();
    }
}
