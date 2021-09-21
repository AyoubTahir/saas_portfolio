<?php

namespace App\Models;

use App\Support\SaveModel\Fields\BooleanField;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'settings';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'               => StringField::new(),
            'website_name_ar'       => StringField::new(),
            'website_name_en'       => StringField::new(),
            'footer_desc_ar'        => StringField::new(),
            'footer_desc_en'        => StringField::new(),
            'facebook'              => StringField::new(),
            'instagram'             => StringField::new(),
            'twiter'                => StringField::new(),
            'linkedin'              => StringField::new(),
            'light_logo_ar'         => FileField::new()->storeIn('images')->disk('uploads'),
            'light_logo_en'         => FileField::new()->storeIn('images')->disk('uploads'),
            'dark_logo_ar'          => FileField::new()->storeIn('images')->disk('uploads'),
            'dark_logo_en'          => FileField::new()->storeIn('images')->disk('uploads'),
            'theme_mode'            => StringField::new(),
            'website_status'        => StringField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
