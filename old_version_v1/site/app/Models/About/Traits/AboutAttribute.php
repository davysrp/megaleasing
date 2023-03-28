<?php

namespace App\Models\About\Traits;

/**
 * Class AboutAttribute.
 */
trait AboutAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-about", "admin.abouts.edit").
                $this->getDeleteButtonAttribute("delete-about", "admin.abouts.destroy")
                .'</div>';
    }
}
