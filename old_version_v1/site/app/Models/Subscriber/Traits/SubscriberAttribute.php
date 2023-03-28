<?php

namespace App\Models\Subscriber\Traits;

/**
 * Class SubscriberAttribute.
 */
trait SubscriberAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-subscriber", "admin.subscribers.edit")}
                {$this->getDeleteButtonAttribute("delete-subscriber", "admin.subscribers.destroy")}
                </div>';
    }
}
