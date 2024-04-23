<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Enclaves\Contracts\Faq as FaqContract;

class Faq extends TranslatableModel implements FaqContract
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'ticket_faqs';

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'answer',
        'question',
        'status',
    ];
}
