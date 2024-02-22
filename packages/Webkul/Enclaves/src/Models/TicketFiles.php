<?php

namespace Webkul\Enclaves\Models;

use Webkul\Core\Eloquent\TranslatableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Enclaves\Contracts\TicketFiles as TicketFilesContract;

class TicketFiles extends TranslatableModel implements TicketFilesContract
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     */
    protected $table = 'ticket_files';

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];
}