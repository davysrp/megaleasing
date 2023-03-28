<?php

namespace App\Models\Slide\Traits;

/**
 * Class SlideAttribute.
 */
trait SlideAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-slide", "admin.slides.edit").$this->getDeleteButtonAttribute("delete-slide", "admin.slides.destroy").'
                </div>';
    }
}
