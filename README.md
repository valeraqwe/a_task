# TVMaze Search API

## Description

This project is an API for searching TV shows using the external TVMaze service. The API allows you to search for TV shows by name through a simple GET request and returns the results in JSON format.

## Installation and Setup

### Requirements

- PHP 8.2
- Laravel 11
- Composer

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/your-repository.git
   
2. Navigate to the project directory

3. Install dependencies using Composer:
   composer install
4. Create a .env file from .env.example:
   cp .env.example .env
5. Start the Laravel development server:
   php artisan serve
   The server will be available at http://localhost:8000.

### Usage

To search for TV shows, send a GET request to the /search route with the q parameter. For example:
    http://localhost:8000/search?q=deadwood

### Testing
To run the tests, use the following command:

php artisan test
or
php artisan test > results.txt
to see results in txt file


### Future Enhancements

There are several ways this project could be improved in the future

Support for Additional Search Parameters:
Enhance the API to allow more advanced search parameters, such as genre, release year, or actor. This would make searches more flexible and precise.

Pagination of Results:
Implement pagination to handle large sets of search results. This would improve performance and user experience when dealing with numerous results.

Caching Results:
Add caching for search results to reduce the number of requests made to the TVMaze API. This would improve response times and decrease load on the external service.

API Rate Limiting and Throttling:
Implement rate limiting to manage the number of requests made to the TVMaze API and prevent abuse. This would ensure the service remains stable and reliable.

