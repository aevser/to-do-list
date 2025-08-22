# 📋 Task API Controller

Современный REST API контроллер для управления задачами, построенный на Laravel с использованием лучших практик архитектуры.

## 🚀 Быстрый старт

### Установка

```bash
# Клонируйте репозиторий
git clone <your-repo-url>

# Установите зависимости
composer install

# Настройте окружение
cp .env.example .env
php artisan key:generate

# Запустите миграции
php artisan migrate
```

## 📊 API Endpoints

| Метод | Endpoint | Описание |
|-------|----------|----------|
| `GET` | `/api/v1/tasks` | Получить список всех задач |
| `GET` | `/api/v1/tasks/{id}` | Получить конкретную задачу |
| `POST` | `/api/v1/tasks` | Создать новую задачу |
| `PUT` | `/api/v1/tasks/{id}` | Обновить задачу |
| `DELETE` | `/api/v1/tasks/{id}` | Удалить задачу |
