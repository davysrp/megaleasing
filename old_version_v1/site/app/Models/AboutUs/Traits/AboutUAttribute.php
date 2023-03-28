<?php

namespace App\Models\AboutUs\Traits;

/**
 * Class AboutUAttribute.
 */
trait AboutUAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-aboutu", "admin.aboutus.edit")}
                {$this->getDeleteButtonAttribute("delete-aboutu", "admin.aboutus.destroy")}
                </div>';
    }
}
