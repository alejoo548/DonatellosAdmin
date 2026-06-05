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
DB_PASSWORD=donatellos_pass
```

From host machine:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3310
DB_DATABASE=donatellos_db
DB_USERNAME=donatellos_user
DB_PASSWORD=donatellos_pass
```

Port `8081` is phpMyAdmin, not MySQL.

**Nota importante:** Esta es la estructura real actual de la base de datos compartida (verificada contra el MySQL en ejecución).

## users

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
name VARCHAR(255) NOT NULL
lastname VARCHAR(255) NOT NULL
email VARCHAR(255) NOT NULL UNIQUE
email_verified_at TIMESTAMP NULL
password VARCHAR(255) NOT NULL
role VARCHAR(255) NOT NULL DEFAULT 'client'   -- 'client' | 'admin'
remember_token VARCHAR(100) NULL
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## categories

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
name VARCHAR(255) NOT NULL
description TEXT NULL
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## products

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
name VARCHAR(255) NOT NULL
description TEXT NULL
price DECIMAL(8,2) NOT NULL
stock INT UNSIGNED NOT NULL DEFAULT 0
status VARCHAR(255) NOT NULL DEFAULT 'available'   -- 'available' | 'unavailable' ?
image VARCHAR(255) NULL
category_id BIGINT UNSIGNED NULL (FK -> categories.id)
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## product_options   <-- NUEVO (del commit de stock + pizza options)

Opciones extras por producto (principalmente para pizzas: tamaños y tipos de masa).

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
product_id BIGINT UNSIGNED NOT NULL (FK -> products.id, ON DELETE CASCADE)
type VARCHAR(191) NOT NULL          -- 'size' | 'crust'
name VARCHAR(191) NOT NULL          -- ej: "Mediana", "Delgada"
extra_price DECIMAL(8,2) NOT NULL DEFAULT 0.00
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## carousel_items   <-- NUEVO (feature carousel)

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
product_id BIGINT UNSIGNED NOT NULL (FK -> products.id, ON DELETE CASCADE)
title VARCHAR(255) NOT NULL
description VARCHAR(255) NOT NULL
badge_text VARCHAR(255) NULL
`order` INT UNSIGNED NOT NULL DEFAULT 0
is_active TINYINT(1) NOT NULL DEFAULT 1
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## cart_items   (usado por mobile app)

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
user_id BIGINT UNSIGNED NOT NULL (FK -> users.id)
product_id BIGINT UNSIGNED NOT NULL (FK -> products.id)
quantity INT UNSIGNED NOT NULL
size VARCHAR(255) NULL
crust VARCHAR(255) NULL
unit_price DECIMAL(8,2) NOT NULL
total_price DECIMAL(8,2) NOT NULL
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## favorite_products   (usado por mobile app)

```text
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
user_id BIGINT UNSIGNED NOT NULL (FK -> users.id)
product_id BIGINT UNSIGNED NOT NULL (FK -> products.id)
created_at TIMESTAMP NULL
updated_at TIMESTAMP NULL
```

## Otras tablas (Laravel + jobs/sessions)

- cache, cache_locks, sessions, jobs, job_batches, failed_jobs, personal_access_tokens, password_reset_tokens, migrations

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

## Notas

- El stock y la tabla product_options vienen del commit "Add product stock and pizza option management".
- Las tablas carousel_items, cart_items y favorite_products son parte del esquema compartido actual.
- Para inspeccionar desde host: usa 127.0.0.1:3310 (o phpMyAdmin en :8081) con las credenciales de arriba.
- Siempre verifica el schema real con el contenedor: `docker compose exec app php artisan migrate:status` y `docker compose exec app php artisan tinker` + Schema::hasTable / DESCRIBE.
