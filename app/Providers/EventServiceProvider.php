<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		// Registered::class => [
		// 	SendEmailVerificationNotification::class,
		// ],
		'App\Events\Tenant\TenantIdentified' => [
			'App\Listeners\Tenant\RegisterTenant',
		],
		'App\Events\Tenant\TenantWasCreated' => [
			'App\Listeners\Tenant\CreateTenantDatabase',
		],

	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		//
	}
}
