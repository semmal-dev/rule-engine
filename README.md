<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README</title>
</head>
<body>
    <h1>Dependency File Scanning Assignment</h1>
    
    <p>This project demonstrates a simplified flow for scanning multiple dependency files in real time. The solution is built using the <strong>Laravel</strong> framework instead of <strong>Symfony</strong>, as Laravel provides robust development support for handling queues and jobs.</p>

    <h2>Setup Instructions</h2>

    <h3>Prerequisites</h3>
    <ul>
        <li>Docker installed</li>
        <li>PHP installed (if not using Sail)</li>
        <li>Composer installed</li>
    </ul>

    <h3>Running the Application</h3>
    <p>The project is built using <strong>Laravel Sail</strong> for Docker integration. You can start the project with either Sail or Docker Compose.</p>

    <h4>Using Laravel Sail</h4>
    <ol>
        <li>Navigate to the <code>vendor/bin</code> directory.</li>
        <li>Start Sail:
            <pre><code>sail up</code></pre>
        </li>
        <li>Run the following commands to migrate the database, start the queue, and execute tests:
            <pre><code>
sail artisan migrate
sail artisan queue:work
sail artisan test
            </code></pre>
        </li>
    </ol>

    <h4>Using Docker Compose</h4>
    <ol>
        <li>Start the Docker containers:
            <pre><code>docker compose up</code></pre>
        </li>
        <li>Inside the Docker container, run:
            <pre><code>
php artisan migrate
php artisan queue:work
php artisan test
            </code></pre>
        </li>
    </ol>

    <h3>Initial Setup After Cloning</h3>
    <ol>
        <li>Clone the repository from GitHub.</li>
        <li>Create a <code>.env</code> file from <code>.env.sample</code>:
            <pre><code>cp .env.sample .env</code></pre>
        </li>
        <li>Create a <code>debricked.php</code> configuration file from the sample:
            <pre><code>cp debricked.php-sample debricked.php</code></pre>
        </li>
        <li>Install dependencies:
            <pre><code>composer install</code></pre>
        </li>
    </ol>

    <h3>Notes on the Flow</h3>
    <ul>
        <li><strong>File Scanning</strong>: The project supports real-time scanning of multiple dependency files. Before submitting files, ensure you are authenticated.</li>
        <li><strong>File Format Handling</strong>: For now, the file format validation is skipped, as the supported formats for Debricked API were unclear. The API errors are caught and handled gracefully.</li>
    </ul>

    <h3>Technologies Used</h3>
    <ul>
        <li><strong>Authentication</strong>: Laravel Passport (OAuth)</li>
        <li><strong>Database</strong>: MySQL</li>
        <li><strong>Queue Management</strong>: Laravel Queue (using the database driver)</li>
        <li><strong>ORM</strong>: Eloquent</li>
        <li><strong>API</strong>: RESTful architecture</li>
        <li><strong>Email Service</strong>: Mailtrap for SMTP</li>
        <li><strong>Framework</strong>: Laravel</li>
    </ul>

    <h3>Future Enhancements</h3>
    <ul>
        <li><strong>File Storage</strong>: Currently, file details are not stored in the database, as scanning is done in real time. This approach sends email notifications based on the scanning response.</li>
        <li><strong>Webhook Integration</strong>: If Debricked offers webhook support, the file data can be stored in the database. Webhooks could then handle large files and send emails for success, failure, and vulnerability warnings once scanning is complete.</li>
    </ul>
</body>
</html>
