<?php

namespace App\Models\JobPosition\Traits;

/**
 * Class JobPositionAttribute.
 */
trait JobPositionAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-jobposition", "admin.jobpositions.edit").$this->getDeleteButtonAttribute("delete-jobposition", "admin.jobpositions.destroy")
                .'</div>';
    }
}
