<?php

namespace Pixelfed;

use \Zttp\Zttp;

class PixelfedApi
{
	protected $domain;
	protected $client;
	protected $curl;

	public function __construct(string $domain, $accessToken = null)
	{
		$this->domain = $domain;
		$this->client = !$accessToken ? Zttp::new() : Zttp::new()->withHeaders([
			'Authorization' => "Bearer {$accessToken}"
		]);
	}

	protected function furl(string $url)
	{
		$this->curl = $this->domain . $url;
	}

	public function user()
	{
		$this->furl("/api/v1/accounts/verify_credentials");
		return $this->get();
	}

	public function accountById(string $id)
	{
		$this->furl("/api/v1/accounts/{$id}");
		return $this->get();
	}

	public function accountFollowersById(string $id)
	{
		$this->furl("/api/v1/accounts/{$id}/followers");
		return $this->get();
	}

	public function accountFollowingById(string $id)
	{
		$this->furl("/api/v1/accounts/{$id}/following");
		return $this->get();
	}

	public function accountStatusesById(string $id)
	{
		$this->furl("/api/v1/accounts/{$id}/statuses");
		return $this->get();
	}

	public function nodeinfo()
	{
		$this->furl("/api/nodeinfo/2.0.json");
		return $this->get();
	}

	protected function get()
	{
		return $this->client->get($this->curl)->json();
	}
}
