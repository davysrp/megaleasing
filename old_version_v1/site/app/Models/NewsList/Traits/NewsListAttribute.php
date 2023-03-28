<?php

namespace App\Models\NewsList\Traits;

/**
 * Class NewsListAttribute.
 */
trait NewsListAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'. $this->getEditButtonAttribute("edit-newslist", "admin.newslists.edit").$this->getDeleteButtonAttribute("delete-newslist", "admin.newslists.destroy").'</div>';
    }
}
