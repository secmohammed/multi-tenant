<?php

namespace App\Tenant\Database;

use App\Tenant\Models\Tenant;

class DatabaseManager {
	public function createConnection(Tenant $tenant) {
		config()->set('database.connections.tenant', $this->getTenantConnection($tenant));
	}
	protected function getTenantConnection(Tenant $tenant) {
		return array_merge(config()->get($this->getConfigConnectionPath()), $tenant->tenantConnection->only('database'));
	}
	protected function getConfigConnectionPath() {
		return sprintf('database.connections.%s', $this->getDefualtConnectionName());
	}
	protected function getDefualtConnectionName() {
		return config('database.default');
	}
}
