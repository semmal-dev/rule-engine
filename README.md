# Dependency File Scanning Assignment

This project demonstrates a simplified flow for scanning multiple dependency files in real time. The solution is built using **Laravel**, which provides robust support for queues and jobs.

## Setup Instructions

### Prerequisites

- Docker installed
- PHP installed (if not using Sail)
- Composer installed

### Running the Application

The project is built using **Laravel Sail** for Docker integration. You can start the project with either Sail or Docker Compose.

### Initial Setup After Cloning

- Clone the repository from GitHub.
- Create a `.env` file from `.env.sample`:
`cp .env.sample .env`


- Create a `debricked.php` configuration file from `debricked.php-sample`:
cp debricked.php-sample debricked.php


- Install dependencies:
`composer install`

#### Using Laravel Sail

1. Navigate to the `vendor/bin` directory.
2. Start Sail:
`sail up`


3. Run the following commands to migrate the database, start the queue, and execute tests:
`sail artisan migrate` `sail artisan queue`
`sail artisan test`


#### Using Docker Compose

1. Start the Docker containers:
`docker compose up`

2. Inside the Docker container, run:
`php artisan migrate` 
`php artisan queue:work`
`php artisan test`

## Notes on Implementation

- **File Scanning**: Supports scanning of multiple files. Authenticate before submitting the files.
- **File Format Handling**: Skipped file format checking due to uncertainty about supported formats, catching errors from the Debricked API.

## Technologies Used

1. **Authentication**: Laravel Passport
2. **Database**: MySQL
3. **Queue**: Laravel Queue, database driver
4. **ORM**: Eloquent
5. **API**: REST
6. **Email (SMTP)**: Mailtrap
7. **Framework**: Laravel

## Future Enhancements

- **File Storage**: Currently not storing file details in the database as files are scanned in real time and emails are sent based on the response.
- **Webhook Integration**: If Debricked has webhook support, we could store file details in the database and manage large file scanning and notific
