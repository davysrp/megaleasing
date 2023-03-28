<?php

namespace App\Models\ProductPhoto\Traits;

/**
 * Class ProductPhotoAttribute.
 */
trait ProductPhotoAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-productphoto", "admin.productphotos.edit")}
                {$this->getDeleteButtonAttribute("delete-productphoto", "admin.productphotos.destroy")}
                </div>';
    }
}
