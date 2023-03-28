<?php

namespace App\Models\ManagementTeam\Traits;

/**
 * Class ManagementTeamAttribute.
 */
trait ManagementTeamAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">' .$this->getEditButtonAttribute("edit-managementteam", "admin.managementteams.edit").
                $this->getDeleteButtonAttribute("delete-managementteam", "admin.managementteams.destroy").
                '</div>';
    }
}
