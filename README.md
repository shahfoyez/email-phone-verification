## Usage

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- That's it: launch the main URL and click `Register` on the top-right
- Create a Vonage account at Vonage and add the following Vonage credentials to your .env file:
`VONAGE_API_KEY=your_api_key
VONAGE_API_SECRET=your_api_secret
VONAGE_PHONE_NUMBER=your_vonage_number`
 
