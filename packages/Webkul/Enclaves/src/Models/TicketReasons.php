<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Enclaves\Contracts\TicketReasons as TicketReasonsContract;

class TicketReasons extends TranslatableModel implements TicketReasonsContract
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     */
    protected $table = 'ticket_reasons';

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];
}