# Database Contract

Shared database for Donatellos mobile app/API and admin dashboard.

## Connection

Inside Docker network:

```env
DB_CONNECTION=mysql
DB_HOST=donatellos_mysql
DB_PORT=3306
DB_DATABASE=donatellos_db
DB_USERNAME=donatellos_user
DB_PASSWORD=
```

From host machine:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3310
DB_DATABASE=donatellos_db
DB_USERNAME=donatellos_user
DB_PASSWORD=
```

Port `8081` is phpMyAdmin, not MySQL.

## users

```text
id_user BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
name VARCHAR(255)
lastname VARCHAR(191)
email VARCHAR(255) UNIQUE
email_verified_at TIMESTAMP NULL
password VARCHAR(255)
role ENUM('client', 'admin') DEFAULT 'client'
remember_token VARCHAR(100) NULL
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## Role Rules

Admin dashboard:

```text
register -> role = admin
login -> only role = admin
```

Mobile app/API:

```text
register -> role = client
login -> only role = client
```
