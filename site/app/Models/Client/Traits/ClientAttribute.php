<?php

namespace App\Models\Client\Traits;

/**
 * Class ClientAttribute.
 */
trait ClientAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-client", "admin.clients.edit").$this->getDeleteButtonAttribute("delete-client", "admin.clients.destroy").'
                </div>';
    }
}
