<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImage extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'project_images';

    protected $guarded = [];

    public $timestamps = false;

    public function saveableFields()
    {
        return [
            'project_id'        => StringField::new(),
            'image'             => FileField::new()->storeIn('images')->disk('uploads'),
        ];
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
