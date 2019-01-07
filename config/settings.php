<?php

return [
	'settings' => [
		'displayErrorDetails' => (getenv('APP_ENV') == 'dev') ? true : false,

		'db' => [
			'driver' => getenv('DB_DRIVER'),
			'host' => getenv('DB_HOST'),
			'database' => getenv('DB_DATABASE'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD'),
			'charset' => getenv('DB_CHARSET'),
			'collation' => getenv('DB_COLLATION'),
			'prefix' => getenv('DB_PREFIX')
		],

		'view' => [
			'template_path' => __DIR__ . '/../templates',
			'cache_path' => (getenv('APP_ENV') == 'prod') ? __DIR__ . '/../var/cache' : false,
		],

		'logger' => [
			'path' => __DIR__ . '/../var/logs/app.log'
		],

		'mailer' => [
			'host' => getenv('MAIL_HOST'),
			'port' => getenv('MAIL_PORT'),
			'username' => getenv('MAIL_USERNAME'),
			'password' => getenv('MAIL_PASSWORD')
		]
	]
];
