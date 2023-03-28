<?php

namespace App\Models\BoardDirector\Traits;

/**
 * Class BoardDirectorAttribute.
 */
trait BoardDirectorAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'. $this->getEditButtonAttribute("edit-boarddirector", "admin.boarddirectors.edit").
                $this->getDeleteButtonAttribute("delete-boarddirector", "admin.boarddirectors.destroy").
                '</div>';
    }
}
