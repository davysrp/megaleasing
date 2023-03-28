<?php

namespace App\Models\PhotoVideo\Traits;

/**
 * Class PhotoVideoAttribute.
 */
trait PhotoVideoAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-photovideo", "admin.photovideos.edit").
                $this->getDeleteButtonAttribute("delete-photovideo", "admin.photovideos.destroy").
                '</div>';
    }
}
