```markdown
# iot-device-monitoring

## Step 1: checkout to the branch or create laravel project
```sh
composer create-project laravel/laravel iot-device-monitoring
```

## Step 2: generate key and clear config
```sh
php artisan key:generate
php artisan config:clear
```

## Step 3: Install All Composer Dependencies
```sh
cd iot-device-monitoring  # Navigate to the project root
composer install
```

## Step 4: Install Sanctum
```sh
php artisan install:api
```

## Step 5: Configure the .env File
Ensure the correct database connection and APP_URL settings:
```dotenv
APP_URL=http://localhost:8000
```

## Step 6: Serve the Application
```sh
php artisan serve
```

### Build and run the Docker containers

Build and run the Docker containers:

```sh
docker-compose up -d --build
```

### API Documentation (Swagger)
Access the API documentation by opening your browser and navigating to:
```
http://localhost:8000/api/documentation
```

### Device API Endpoints

- **Store Device**
    - **URL:** `/api/v1/devices`
    - **Method:** `POST`
    - **Request Body:**
      ```json
      {
        "device_name": "Device 1",
        "location": "Building A"
      }
      ```
    - **Response:**
      ```json
      {
        "data": {
          "id": 1,
          "device_name": "Device 1",
          "location": "Building A",
          "created_at": "2023-10-01T12:00:00Z",
          "updated_at": "2023-10-01T12:00:00Z"
        }
      }
      ```

- **Get Devices**
    - **URL:** `/api/v1/devices`
    - **Method:** `GET`
    - **Response:**
      ```json
      {
        "data": [
          {
            "id": 1,
            "device_name": "Device 1",
            "location": "Building A",
            "created_at": "2023-10-01T12:00:00Z",
            "updated_at": "2023-10-01T12:00:00Z"
          }
        ]
      }
      ```

- **Update Device**
    - **URL:** `/api/v1/devices/{id}`
    - **Method:** `PUT`
    - **Request Body:**
      ```json
      {
        "device_name": "Updated Device",
        "location": "Building B"
      }
      ```
    - **Response:**
      ```json
      {
        "data": {
          "id": 1,
          "device_name": "Updated Device",
          "location": "Building B",
          "created_at": "2023-10-01T12:00:00Z",
          "updated_at": "2023-10-01T12:00:00Z"
        }
      }
      ```

### SensorData API Endpoints

- **Store Sensor Data**
    - **URL:** `/api/v1/sensor-data`
    - **Method:** `POST`
    - **Request Body:**
      ```json
      {
        "device_id": 1,
        "temperature": 25.5,
        "humidity": 60.5,
        "status": "active",
        "timestamp": "2025-03-04T12:00:00Z"
      }
      ```
    - **Response:**
      ```json
      {
        "data": {
          "id": 1,
          "device_id": 1,
          "temperature": 25.5,
          "humidity": 60.5,
          "status": "active",
          "timestamp": "2025-03-04T12:00:00Z",
          "created_at": "2023-10-01T12:00:00Z",
          "updated_at": "2023-10-01T12:00:00Z"
        }
      }
      ```

- **Get Latest Status**
    - **URL:** `/api/v1/devices/{deviceId}/latest-status`
    - **Method:** `GET`
    - **Response:**
      ```json
      {
        "data": {
          "id": 1,
          "device_id": 1,
          "temperature": 25.5,
          "humidity": 60.5,
          "status": "active",
          "timestamp": "2025-03-04T12:00:00Z",
          "created_at": "2023-10-01T12:00:00Z",
          "updated_at": "2023-10-01T12:00:00Z"
        }
      }
      ```

- **Get Historical Status**
    - **URL:** `/api/v1/devices/{deviceId}/historical-status`
    - **Method:** `GET`
    - **Query Parameters:**
        - `start_time`: Start time in `YYYY-MM-DDTHH:MM:SSZ` format
        - `end_time`: End time in `YYYY-MM-DDTHH:MM:SSZ` format
    - **Response:**
      ```json
      {
        "data": [
          {
            "id": 1,
            "device_id": 1,
            "temperature": 25.5,
            "humidity": 60.5,
            "status": "active",
            "timestamp": "2025-03-04T12:00:00Z",
            "created_at": "2023-10-01T12:00:00Z",
            "updated_at": "2023-10-01T12:00:00Z"
          }
        ]
      }
      ```
```
