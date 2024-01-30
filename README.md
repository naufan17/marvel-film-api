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
    "name": Varchar,
    "email": Varchar,
    "password": Varchar
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
    "email": Varchar,
    "password": Varchar
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

### 3. Get Movies
- Method: `GET`
- URL Patterns: `/api/movies?title={title}&page={page}&limit={limit}`
- Authentication: `false`
- Params: `title or page or limit`
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
            "current_page": 1,
            "data": [
                {
                    "id": BigInt,
                    "title": Varchar,
                    "poster": Varchar,
                    "year": Year,
                    "plot": Varchar
                },            
            ]
        }
    }
    ```
  - Errors: (404)
    ```json
    { 
        "message": "Data failed to get" 
    }
    ```

### 4. Get Movies by Id
- Method: `GET`
- URL Patterns: `/api/movies/{id}`
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

### 5. Add Movies
- Method: `POST`
- URL Patterns: `/api/movies`
- Authetication: `true`
- Body:
  ```json
  {
    "title": Varchar,
    "year": Varchar,
    "trailer": Varchar,
    "torrent": text,
  }
  ```
- Usage:
  ```
  curl -X POST \
  -H "Authorization: Bearer <ACCESS_TOKEN>"
  -d '{
    "title": "title",
    "year": "year", 
    "trailer": "trailer",
    "torrent": "torrent"
  }' \
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
        "status": "Success",
        "message": "Data stored successfully",
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
            "torrent": Text,
            "update_at": Date,
            "created_at": Date,
            "id": BigInt,
        },    
    }
    ```
  - Errors: (404)
    ```json
    {
      "message": "Error"
    }
    ```

### 6. Delete Movies
- Method: `DELETE`
- URL Patterns: `/api/movies/{id}`
- Authetication: `true`
- Usage:
  ```
  curl -X POST \
  -H "Authorization: Bearer <ACCESS_TOKEN>" \
  URL_Patterns
  ```
- Response:
  - Success: (200)
    ```json
    {
        "status": "Success",
        "message": "Data deleted successfully",
    }
    ```
  - Errors: (404)
    ```json
    {
      "message": "Error"
    }
    ```
