<?php
namespace App\Models;

use Backpack\PageManager\app\Models\Page as BasePage;
use App\PageTemplates;

class CustomPage extends BasePage
{
    use PageTemplates;
    protected $table = 'pages';
    protected $fillable = [
        'template',
        'name',
        'title',
        'slug',   
        'extras', 
    ];

    protected $casts = [
        'template' => 'string',
        'name' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'extras' => 'array', 
    ];

    public function setExtrasAttribute($value)
    {
        $this->save1($value);
        $this->save2($value);
        $this->save3($value);
        $this->save4($value);
        
    }

    private function save1(&$value) {
        $extras = $this->extras ?? [];
        if (is_array($value)) {
            if (isset($value['hero_bg'])) {
                $path = $value['hero_bg']->store('uploads', 'public');

                $extras['hero_bg'] = $path;
                $value['hero_bg'] = $path;
            }

            $extras = array_merge($extras, $value);
        }
        
        $this->attributes['extras'] = json_encode($extras);
    }

    private function save2(&$value) {
        $extras = $this->extras ?? [];

        if (is_array($value)) {
            if (isset($value['about_image'])) {
                $path = $value['about_image']->store('uploads', 'public');

                $extras['about_image'] = $path;
                $value['about_image'] = $path;
            }

            $extras = array_merge($extras, $value);
        }
        
        $this->attributes['extras'] = json_encode($extras);
    }

    private function save3(&$value) {
        $extras = $this->extras ?? [];
        
        if (is_array($value)) {
            if (isset($value['sale_logo'])) {
                $path = $value['sale_logo']->store('uploads', 'public');

                $extras['sale_logo'] = $path;
                $value['sale_logo'] = $path;
            }

            $extras = array_merge($extras, $value);
        }
        
        $this->attributes['extras'] = json_encode($extras);
    }

    private function save4(&$value) {
        $extras = $this->extras ?? [];
        
        if (is_array($value)) {
            if (isset($value['logo'])) {
                $path = $value['logo']->store('uploads', 'public');

                $extras['logo'] = $path;
                $value['logo'] = $path;
            }

            $extras = array_merge($extras, $value);
        }
        
        $this->attributes['extras'] = json_encode($extras);
    }
}
