<?php

namespace App\Models\Explore\Traits;

/**
 * Class ExploreAttribute.
 */
trait ExploreAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-explore", "admin.explores.edit").$this->getDeleteButtonAttribute("delete-explore", "admin.explores.destroy").
                '</div>';
    }
}
