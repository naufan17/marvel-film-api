# Marvel Film API
API that provides data for Marvel movies and series. There are around 30+ data in the form of titles, posters, release years, trailers, release dates, durations, genres, directors, authors, actors, plots and download links via torrent.

## How to setup local code program:
- Clone this repository
- Run this command to import database structure:
```
php artisan migrate
```
- Run this command to start the server:
```
php artisan serve
```

## API Documentation
### 1. Register User
- Method: `POST`
- URL Patterns: `/api/register`
- Authetication: `false`
- Body:
  ```json
  {
    "name": String,
    "email": String,
    "password": String
  }
  ```
- Usage:
  ```
  curl -X POST \
  -d '{
    "name": "name",
    "email": "email", 
    "password": "password"
  }' \
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
      "message": "Register successfull"
      "token": String
      "token_type": "Bearer"    
    }
    ```
  - Errors: (404)
    ```json
    {
      "message": "Error"
    }
    ```

### 2. Login User
- Method: `POST`
- URL Patterns: `/api/login`
- Authetication: `false`
- Body:
  ```json
  {
    "email": String,
    "password": String
  }
  ```
- Usage:
  ```
  curl -X POST \
  -d '{
    "email": "email",
    "password": "password"
  }' \
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
      "message": "Login successfull"
      "token": String
      "token_type": "Bearer"    
    }
    ```
  - Errors: (404)
    ```json
    {
      "message": "Error"
    }
    ```

### 2. Get All Movies
- Method: `GET`
- URL Patterns: `/api/movies`
- Authentication: `false`
- Usage:
  ```
  curl -X GET
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
    "status": "Success",
    "data": [
        {
            "id": BigInt,
            "title": Varchar,
            "poster": Varchar,
            "year": Year,
            "plot": Varchar
        },
    }
    ```
  - Errors: (404)
    ```json
    { 
        "message": "Data failed to get" 
    }
    ```

### 3. Get Movies by Title
- Method: `GET`
- URL Patterns: `/api/movies`
- Authentication: `false`
- Usage:
  ```
  curl -X GET
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
    "status": "Success",
    "data": [
        {
            "id": BigInt,
            "title": Varchar,
            "poster": Varchar,
            "year": Year,
            "plot": Varchar
        },
    }
    ```
  - Errors: (404)
    ```json
    { 
        "message": "Data failed to get" 
    }
    ```

### 4. Get Movies by Title
- Method: `GET`
- URL Patterns: `/api/movies?title={title}`
- Authentication: `false`
- Params: `title`
- Usage:
  ```
  curl -X GET
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
        "status": "Success",
        "data": {
            "id": BigInt,
            "title": Varchar,
            "poster": Varchar,
            "year": Year,
            "plot": Varchar
        },
    }
    ```
  - Errors: (404)
    ```json
    { 
        "message": "Data failed to get" 
    }
    ```
    
### 5. Get Movies by Id
- Method: `GET`
- URL Patterns: `/api/movies/{Id}`
- Authentication: `false`
- Usage:
  ```
  curl -X GET
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
        "status": "Success",
        "data": {
            "title": Varchar,
            "poster": Varchar,
            "year": Year,
            "trailer": Varchar,
            "released": Varchar,
            "runtime": Varchar,
            "genre": Varchar,
            "director": Varchar,
            "writer": Varchar,
            "actors": Varchar,
            "plot": Varchar,
            "torrent": Text
        },    
    }
    ```
  - Errors: (404)
    ```json
    { 
        "message": "Data failed to get" 
    }
    ```
