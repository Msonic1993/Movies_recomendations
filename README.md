
# Movies Recomendation Application


## Requirements

To run the application, you need:
```bash
- PHP 8.1 or higher
- Composer
```
## Installation
1. Clone the repository:
```bash
git clone https://github.com/Msonic1993/Movies_recomendations.git
```
2. Navigate to the project directory:
```bash
cd Movies_recomendations
```
3. Install dependencies using Composer on Docker container

```bash
docker-compose up -d
```

```bash
docker exec movies_recomendations_php_1 composer install
```
4. Run the application:

```bash
docker exec movies_recomendations_php_1 php index.php
```

## Unit tests

To run the unit tests, execute the following command:

```bash
docker exec movies_recomendations_php_1 ./vendor/bin/phpunit tests
```