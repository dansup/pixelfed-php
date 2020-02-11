<?php

namespace Pixelfed;

use \Zttp\Zttp;
use \Exception;

class PixelfedApi
{
	/** @var string */
	protected $domain;

	/** @var \Zttp\Zttp */
	protected $client;

	/** @var string */
	protected $curl;

	/** @var array */
	protected $params = [];

	/** @param string $domain */
	/** @param string $accessToken|null */
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

	public function followAccountById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/follow");
		return $this->post();
	}

	public function unfollowAccountById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/unfollow");
		return $this->post();
	}

	public function accountBlockById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/block");
		return $this->post();
	}

	public function accountUnblockById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/unblock");
		return $this->post();
	}

	public function statusFavouriteById($id)
	{
		$this->furl("/api/v1/statuses/{$id}/favourite");
		return $this->post();
	}

	public function statusUnfavouriteById($id)
	{
		$this->furl("/api/v1/statuses/{$id}/unfavourite");
		return $this->post();
	}

	public function mediaUpload($file)
	{
		$this->furl("/api/v1/media");
		$this->params = [[
			'name' => 'file',
			'contents' => $file,
			'filename' => 'tmp.jpg'
		]];
		return $this->multipartPost();
	}

	public function accountMuteById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/mute");
		return $this->post();
	}

	public function accountUnmuteById($id)
	{
		$this->furl("/api/v1/accounts/{$id}/unmute");
		return $this->post();
	}

	public function statusCreate($mediaIds = [], $caption = null, bool $sensitive = false, $scope = 'public', $inReplyToId = null)
	{
		if(empty($mediaIds) || !is_array($mediaIds)) {
			throw new Exception('Invalid media_ids. Must be an array of integers.');
		}

		if(!in_array($scope, ['private','unlisted','public'])) {
			throw new Exception('Invalid scope. Must be private, unlisted or public');
		}

		$this->furl("/api/v1/statuses");
		$this->params = [
			'media_ids' => $mediaIds,
			'status' => $caption,
			'in_reply_to_id' => $inReplyToId,
			'sensitive' => $sensitive,
			'visibility' => $scope
		];
		return $this->post();
	}

	protected function get()
	{
		return $this->client->get($this->curl)->json();
	}

	protected function multipartPost()
	{
		return $this->client->asMultipart()->post($this->curl, $this->params)->json();
	}

	protected function post()
	{
		return $this->client->post($this->curl, $this->params)->json();
	}
}
