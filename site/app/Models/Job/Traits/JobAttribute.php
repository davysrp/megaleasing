<?php

namespace App\Models\Job\Traits;

/**
 * Class JobAttribute.
 */
trait JobAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-job", "admin.jobs.edit").$this->getDeleteButtonAttribute("delete-job", "admin.jobs.destroy").
                '</div>';
    }
}
