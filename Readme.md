## USA Rugby Statistics system

This system, originally developed by Matt Trenary, provides an interface and tracking for USA Rugbys National Championship Series.
"The National Championship Series web application is designed to facilitate the management of championship event rosters, scores, and game information. It is designed to work from any phone, computer, or tablet that can access the internet."


### Database

To configure the database create file `app/config.php` with the following structure:

```PHP
<?php

$config = array(
  'username' => 'user',
  'password' => 'pass',
  'database' => 'db',
);
```

Included under directory: "db" is the DDL used for the system; if there are updates to the structure this can be documented using the following command:

`mysqldump -d --skip-add-drop-table --skip-add-locks --skip-disable-keys --skip-set-charset --skip-comments --compact -u<user> -p<pass> <dbname>`
