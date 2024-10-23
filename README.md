# DiabloMarket
DiabloMarket is a prototype platform for trading in-game items from Diablo, built with Laravel. This project is currently in development and focuses on creating an intuitive platform for users to exchange items such as elixirs, gems, equipment, and weapons.

## Features
- **Elixir and Gem Listings**: Users can create, store, and search for elixir and gem advertisements.
- **Basic Search Functionality**: Search is implemented for elixirs, equipment, and weapons.
- **Models and Controllers**: Necessary models, migrations, and controller templates for elixirs, gems, and initial setups for equipment and weapons are in place.
- **User Authentication**: Standard authentication with registration, login, and profile editing.

## Installation
To set up the project locally.


Clone the repository and install the dependencies via Composer:
```bash
composer install
```
Run migrations to set up the database:
```bash
php artisan migrate
```
Serve the application:
```bash
php artisan serve
```
