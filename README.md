# Electricity Billing System


## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [API Documentation](#api-documentation)
  - [User Registration](#user-registration)
  - [User Login](#user-login)
  - [Fetch Providers](#fetch-providers)
  - [Make Payment](#make-payment)
  - [Fetch Payment History](#fetch-payment-history)
- [Test Account Credentials](#test-account-credentials)
- [Contributing](#contributing)
- [License](#license)
- [Contact Information](#contact-information)

## Project Overview

The Electricity Billing System is a web-based application that allows users to register, login, view available electricity providers, and make bill payments. The system also provides users with a history of their transactions, ensuring a seamless and efficient billing process.

## Features

- **User Registration and Authentication**: Secure user authentication using Laravel Sanctum.
- **List of Electricity Providers**: Fetch and display a list of available electricity providers.
- **Bill Payment System**: Users can make payments to their selected providers.
- **Payment History**: Users can view their payment history.
- **Input Validation and Security**: Ensuring data integrity and security.

## Technologies Used

- **Backend**: Laravel 10.x
- **Database**: MySQL or SQLite
- **Authentication**: Laravel Sanctum
- **Environment**: PHP 8.x, Composer
- **API Testing**: Postman

## Setup Instructions

### Prerequisites

- PHP 8.x or higher
- Composer
- MySQL or SQLite
- Laravel 10.x

### Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/your_github_username/electricity-billing-system.git
   cd electricity-billing-system



   Install Dependencies:

composer install
Set Up the Environment:

bash
Copy code
cp .env.example .env
Update the .env file with your database credentials.

Generate Application Key:


php artisan key:generate
Set Up the Database:

php artisan migrate --seed
Run the Development Server:


php artisan serve
API Documentation
User Registration
Endpoint: POST /api/register

Request Body:

json
{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "password": "password"
}
Response:

json
{
  "message": "Registration successful",
  "token": "your_access_token"
}
User Login
Endpoint: POST /api/login

Request Body:

json
{
  "email": "john.doe@example.com",
  "password": "password"
}
Response:

json
Copy code
{
  "message": "Login successful",
  "token": "your_access_token"
}
Fetch Providers
Endpoint: GET /api/providers

Response:

json
[
  {
    "id": 1,
    "name": "Provider One",
    "logo_url": "https://via.placeholder.com/150",
    "description": "Description for Provider One"
  },
  {
    "id": 2,
    "name": "Provider Two",
    "logo_url": "https://via.placeholder.com/150",
    "description": "Description for Provider Two"
  },
  {
    "id": 3,
    "name": "Provider Three",
    "logo_url": "https://via.placeholder.com/150",
    "description": "Description for Provider Three"
  }
]
Make Payment
Endpoint: POST /api/payments

Request Body:

json
{
  "provider_id": 1,
  "meter_number": "1234567890",
  "amount": 100
}
Response:

json
{
  "message": "Payment successful",
  "transaction": {
    "id": 1,
    "user_id": 1,
    "provider_id": 1,
    "meter_number": "1234567890",
    "amount": 100,
    "created_at": "2024-11-29T12:34:56.000000Z"
  }
}
Fetch Payment History
Endpoint: GET /api/payments

Response:

json
{
  "data": [
    {
      "id": 1,
      "provider_id": 1,
      "amount": 100,
      "created_at": "2024-11-29T12:34:56.000000Z"
    },
    {
      "id": 2,
      "provider_id": 2,
      "amount": 50,
      "created_at": "2024-11-30T08:22:11.000000Z"
    }
  ],
  "links": {
    "first": "http://localhost/api/payments?page=1",
    "last": "http://localhost/api/payments?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "per_page": 15,
    "to": 2,
    "total": 2
  }
}
Test Account Credentials
For testing purposes, use the following credentials:

Email: testuser@example.com
Password: password
