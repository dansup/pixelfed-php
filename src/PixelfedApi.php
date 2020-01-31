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

	public function accountSearch($query)
	{
		$this->furl("/api/v1/accounts/search?q={$query}");
		return $this->get();
	}

	public function accountBlocks()
	{
		$this->furl("/api/v1/blocks");
		return $this->get();
	}

	public function accountLikes()
	{
		$this->furl("/api/v1/favourites");
		return $this->get();
	}

	public function accountFollowRequests()
	{
		$this->furl("/api/v1/follow_requests");
		return $this->get();
	}

	public function instance()
	{
		$this->furl("/api/v1/instance");
		return $this->get();
	}

	public function accountMutes()
	{
		$this->furl("/api/v1/mutes");
		return $this->get();
	}

	public function accountNotifications()
	{
		$this->furl("/api/v1/notifications");
		return $this->get();
	}

	public function homeTimeline()
	{
		$this->furl("/api/v1/timelines/home");
		return $this->get();
	}

	public function publicTimeline()
	{
		$this->furl("/api/v1/timelines/public");
		return $this->get();
	}

	public function statusById($id)
	{
		$this->furl("/api/v1/statuses/{$id}");
		return $this->get();
	}

	public function statusRebloggedById($id)
	{
		$this->furl("/api/v1/statuses/{$id}/reblogged_by");
		return $this->get();
	}

	public function statusLikedById($id)
	{
		$this->furl("/api/v1/statuses/{$id}/favourited_by");
		return $this->get();
	}

	protected function get()
	{
		return $this->client->get($this->curl)->json();
	}
}
