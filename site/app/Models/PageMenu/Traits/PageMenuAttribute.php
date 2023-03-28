<?php

namespace App\Models\PageMenu\Traits;

/**
 * Class PageMenuAttribute.
 */
trait PageMenuAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-pagemenu", "admin.pagemenus.edit").
                $this->getDeleteButtonAttribute("delete-pagemenu", "admin.pagemenus.destroy").'
                </div>';
    }
}
