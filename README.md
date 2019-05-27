# Laundry Online Using PHP
---

## prerequisite
- PHP ^5.4
- MySQL
- XAMPP

## Installation
- clone the repo `git@github.com:deaamaliaputri/laundry_online.git`
- cd laundry_online
- execute sql query on PHPMyAdmin

## Setup
config the Database

```
// database.php

...
  private $db_host = "localhost";  // Change as required
	private $db_user = "root";  // Change as required
	private $db_pass = "";  // Change as required
	private $db_name = "11_deaamaliaputri_laundry";	// Change as required
...

```

## Running development
- using built in server `php -S localhost:8000/index.php`
- using xampp `localhost/laundry_online/index.php`
