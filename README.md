# Getting Started

## GET fullname

### Endpoint: http://localhost/rest_service/service/user/read_single.php

QUERY PARAMS: username and password.

## Example:

### Request: http://localhost/rest_service/service/user/read_single.php?username=admin&password=admin
### Response:
    {
    "res": true,
    "data": {
        "fullname": "Juan Perez"
        }
    }