<?php

namespace App\Models\Settings;

use App\Models\BaseModel;

class Setting extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['logo',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'telegram',
        'linkedin',
        'favicon',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'company_contact',
        'company_address',
        'company_address_eng',
        'work_time',
        'work_time_eng',
        'calculate_note',
        'calculate_note_eng',
        'from_email',
        'footer_text',
        'copyright_text',
        'terms',
        'disclaimer',
        'google_analytics',
        "jobFormMail",
        "feedbackFormMail",
        "onlineRequestFormMail",
        "corporateFormMail",
        "popupVideo",
        "popupImage",
        ];

    public function __construct()
    {
        $this->table = config('access.settings_table');
    }
}
