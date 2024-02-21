<?php

namespace Webkul\Enclaves\Models;

use Webkul\Core\Eloquent\TranslatableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Enclaves\Contracts\TicketStatus as TicketStatusContract;

class TicketStatus extends TranslatableModel implements TicketStatusContract
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     */
    protected $table = 'ticket_status';

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];
}