<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\TenantDatabaseCreated;
use App\Events\Tenant\TenantWasCreated;
use App\Tenant\Database\DatabaseCreator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTenantDatabase
{
    protected $databaseCreator;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseCreator $databaseCreator)
    {
        $this->databaseCreator = $databaseCreator;
    }

    /**
     * Handle the event.
     *
     * @param  TenantWasCreated  $event
     * @return void
     */
    public function handle(TenantWasCreated $event)
    {
        if (!$this->databaseCreator->create($event->tenant)) {
            throw new \Exception('Database failed to be created.');
        }

        event(new TenantDatabaseCreated($event->tenant));
    }
}
