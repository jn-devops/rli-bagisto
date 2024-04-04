<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Enclaves\Contracts\Tickets as TicketsContract;

class Tickets extends TranslatableModel implements TicketsContract
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     */
    protected $table = 'tickets';

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes= [];

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'customer_id',
        'ticket_reason_id',
        'ticket_status_id',
        'comment',
    ];

    /**
     * Get the options.
     */
    public function files(): HasMany
    {
        return $this->hasMany(TicketFilesProxy::modelClass(), 'ticket_id');
    }

    /**
     * Get the options.
     */
    public function reasons(): BelongsTo
    {
        return $this->belongsTo(TicketReasonsProxy::modelClass(), 'ticket_reason_id');
    }

    /**
     * Get the options.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(TicketStatusProxy::modelClass(), 'ticket_status_id');
    }
}