<?php

namespace App\Models\Project\Traits;

/**
 * Class ProjectAttribute.
 */
trait ProjectAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-project", "admin.projects.edit").$this->getDeleteButtonAttribute("delete-project", "admin.projects.destroy").
                '</div>';
    }
}
