<?php

namespace App\Models\PhoductPhoto\Traits;

/**
 * Class PhoductPhotoAttribute.
 */
trait PhoductPhotoAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-phoductphoto", "admin.phoductphotos.edit").
                $this->getDeleteButtonAttribute("delete-phoductphoto", "admin.phoductphotos.destroy").'
                </div>';
    }
}
