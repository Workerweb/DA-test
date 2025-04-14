# Task API

Простое REST API на Laravel для управления задачами с приоритезацией.

## Требования

- PHP 8.1+
- Composer
- SQLite / MySQL
- Laravel 10+

## Установка

1. Клонируй репозиторий:

```bash
   git clone https://github.com/Workerweb/DA-test.git
   cd DA-test
```

2. Установи зависимости:

```bash
	composer install
```

3. Скопируй .env и сгенерируй ключ:

```bash
cp .env.example .env
php artisan key:generate
```

4. Укажи настройки базы данных в .env:

```bash
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=digital-alliance-test
	DB_USERNAME=root
	DB_PASSWORD=
```

5. Примени миграции:

```bash
	php artisan migrate
```

6. (Опционально) Наполни тестовыми данными:

```bash
	php artisan db:seed
```

## Запуск

```bash
	php artisan serve
```
API будет доступно по адресу: http://localhost:8000/api

## Тесты

Для запуска тестов:

```bash
	php artisan test
```

## Документация 

Для генерации документации

```bash
	php artisan l5-swagger:generate
```

Документация будет доступна по адресу: http://localhost:8000/api/documentation