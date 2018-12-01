<?php

namespace App\Tenant\Database;

use App\Tenant\Models\Tenant;
use Illuminate\Support\Facades\DB;

/**
 * Database Creator
 */
class DatabaseCreator {

	public function create(Tenant $tenant) {
		return DB::statement("
            CREATE DATABASE multi_tenant_{$tenant->id}
        ");
	}
}