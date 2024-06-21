# Kanye Quotes Application

## Setup Instructions

1. Clone the repository:
   `git clone <repository-url>`
   `cd kanye-quotes`

2. Install dependencies:
   `composer install`

3. Set up environment variables:
   `cp .env.example .env`
   `php artisan key:generate`

4. Add API_TOKEN=your_secure_api_token to your .env file.

5. Run migrations:
   `php artisan migrate`

6. Start the server:
   `php artisan serve`

## Testing Instructions

1. Run feature tests:
   `php artisan test --filter=QuoteFeatureTest`

2. Optionally, run unit tests:
   `php artisan test`

This should cover the core requirements and optional enhancements for the technical test.
