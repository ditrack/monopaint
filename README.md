CONFIGURATION
-------------
### Server

Server path `path/to/project/monopaint/web`

	`<Directory path/to/project/monopaint/web>
    		Order deny,allow
    		Allow from all
            Options All
	        AllowOverride All
            Require all granted
	</Directory>`
	
### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=monopaint',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Create database with name that write after `dbname=`

### Install

1.Install dependency via composer
`composer install`

2. php yii migrate/up --migrationPath=@app/modules/monopaint/migrations
3. php yii picture/init