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
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.
