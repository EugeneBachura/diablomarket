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

## Usage
Once installed, you can launch the application on your server and try creating advertisements for items such as elixirs and gems. Currently, the project is in its early stages, and the main logic for handling item exchanges is partially implemented.

## Upcoming Features
The following features are planned but not yet fully implemented:

 - **Saving Equipment and Weapon Listings**: Users will be able to list equipment and weapons.
 - **Displaying All Advertisements**: A view to show all item listings.
 - **Filtering Options**: Filtering items based on their type, rarity, and other attributes.
 - **Item Purchase and Rating**: Users will be able to purchase items from other users and leave a rating at the end of the transaction.
