# Pixelfed PHP Library

PHP Library for [Pixelfed](https://pixelfed.org)

## Installation

Install with [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

```bash
composer require dansup/pixelfed-php
```

## Authentication
You need a token from a Pixelfed instance. Navigate to ```/settings/applications``` on the Pixelfed instance and generate a new ```Personal Access Tokens```. Use that token for authentication.


## Examples
### Nodeinfo
```bash
php -f examples/nodeinfo.php
```


## Methods


### user()
Returns current user.
> GET /api/v1/accounts/verify_credentials

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->user();
```

### accountById($id)
Fetch account by user id.
> GET /api/v1/accounts/{$id}

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountById($id);
```

### accountFollowersById($id)
Fetch account followers by user id.
> GET /api/v1/accounts/{$id}/followers

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountFollowersById($id);
```


### accountFollowingById($id)
Fetch account following by user id.
> GET /api/v1/accounts/{$id}/following

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountFollowingById($id);
```

### accountStatusesById($id)
Fetch account statuses by user id.
> GET /api/v1/accounts/{$id}/statuses

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountStatusesById($id);
```

### accountSearch($id)
Fetch accounts by search query.
> GET /api/v1/accounts/search?q={$id}

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountSearch($id);
```

### accountBlocks()
Fetch account blocks of current user.
> GET /api/v1/blocks

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountBlocks();
```

### accountLikes()
Fetch likes of current user.
> GET /api/v1/favourites

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountLikes();
```

### accountFollowRequests()
Fetch follow requests of current user.
> GET /api/v1/follow_requests

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountFollowRequests();
```

### instance()
Fetch pixelfed instance data.
> GET /api/v1/instance

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->instance();
```

### accountMutes()
Fetch account mutes of current user.
> GET /api/v1/mutes

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountMutes();
```

### accountNotifications()
Fetch notifications of current user.
> GET /api/v1/notifications

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountNotifications();
```

### homeTimeline()
Fetch home timeline.
> GET /api/v1/timelines/home

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->homeTimeline();
```

### publicTimeline()
Fetch public timeline.
> GET /api/v1/timelines/public

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->publicTimeline();
```

### statusById($id)
Fetch status by id.
> GET /api/v1/statuses/{$id}

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusById($id);
```

### statusRebloggedById($id)
Fetch reblogs/shares by status id.
> GET /api/v1/statuses/{$id}/reblogged_by

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusRebloggedById($id);
```

### statusLikedById($id)
Fetch likes by status id.
> GET /api/v1/statuses/{$id}/favourited_by

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusLikedById($id);
```

### followAccountById($id)
Follow account by id.
> POST /api/v1/accounts/{$id}/follow

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->followAccountById($id);
```

### unfollowAccountById($id)
Unfollow account by id.
> POST /api/v1/accounts/{$id}/unfollow

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->unfollowAccountById($id);
```

### accountBlockById($id)
Block account by id.
> POST /api/v1/accounts/{$id}/block

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountBlockById($id);
```

### accountUnblockById($id)
Unblock account by id.
> POST /api/v1/accounts/{$id}/unblock

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountUnblockById($id);
```

### statusFavouriteById($id)
Like status by id.
> POST /api/v1/statuses/{$id}/favourite

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusFavouriteById($id);
```

### statusUnfavouriteById($id)
Unlike status by id.
> POST /api/v1/statuses/{$id}/unfavourite

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusUnfavouriteById($id);
```

### mediaUpload($file)
Upload media.
> POST /api/v1/media

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->mediaUpload($file);
```

### accountMuteById($id)
Mute account by id.
> POST /api/v1/accounts/{$id}/mute

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountMuteById($id);
```

### accountUnmuteById($id)
Unmute account by id.
> POST /api/v1/accounts/{$id}/unmute

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->accountUnmuteById($id);
```

### statusCreate($mediaIds = [], $caption = null, $sensitive = false, $scope = 'public', $inReplyToId = null)
Create new status, requires ```$mediaIds``` from ```mediaUpload()```
> POST /api/v1/statuses

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$data = $api->statusCreate($mediaIds, $caption = null, $sensitive = false, $scope = 'public', $inReplyToId = null);
```

### nodeinfo()
Fetch instance nodeinfo.
> GET /api/nodeinfo/2.0.json

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$api = new PixelfedApi($domain);
$data = $api->nodeinfo();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daniel Supernault](https://github.com/dansup)
- [All Contributors](../../contributors)