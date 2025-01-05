## Installation

1. **Clone the repository:**
    ```sh
    [https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application.git](https://github.com/080304/Vehicle.git)
    ```

2. **Install Composer dependencies:**
    ```sh
    composer install
    ```

3. **Copy `.env.example` to `.env` and update the environment variables:**
    ```sh
    cp .env.example .env
    ```

4. **link storage directory to the public director:**
    ```sh
   php artisan storage:link
    ```
5. **Generate application key:**
    ```sh
    php artisan key:generate
    ```

6. **Update `.env` with your database and Stripe API keys.**

7. **Run database migrations:**
    ```sh
    php artisan migrate
    ```

8. **Serve the application:**
    ```sh
    php artisan serve
    ```

9. **Access the application in your browser at [http://localhost:8000](http://localhost:8000).**
