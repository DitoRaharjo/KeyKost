---
title: API Reference

language_tabs:
- bash

includes:

search: true

toc_footers:
- <a href='http://ditoraharjo.co/keykost'>MissKeen API Doc</a>
---
<!-- START_INFO -->
# Info

KeyKost API Documentation
<!-- END_INFO -->

<!-- START_4da3c74fdcbf4cdb10a2b385902f342f -->
# Login Authentication
> Example request:

```bash
curl -X POST "http://ditoraharjo.co/keykost/api/v1/auth" \
-H "Content-Type: application/json" \
-d '{
"email" : "your@mail.com",
"password" : "your-password"
}'
```
> Example response:

```json
{
    "status": "true",
    "user": {
        "pemilikKost_id": "your-user-ID",
        "kost_id": "your-kost-id"
    }
}
```
<p> This endpoints used for authenticating user login.</p>

### HTTP Request
`POST http://ditoraharjo.co/keykost/api/v1/auth`

### Request Body Parameters

Parameter | Type | Status
--------- | ------- | ------- |
    email | string |  required
    password | string |  required


<!-- END_4da3c74fdcbf4cdb10a2b385902f342f -->

#Penyewa
<!-- START_197edfbef2c1ddadda97abeb410e9fd2 -->
## Get All Penyewa

> Example request:

```bash
curl -X GET "http://ditoraharjo.co/keykost/api/v1/penyewa?kost_id=YOUR-KOST-ID" \
-H "Accept: application/json"
```

> Example response:

```json
{
    {
    "id": 3,
    "rfid_id": "PENYEWA_1",
    "fullname": "Penyewa 1",
    "email": "penyewa1@gmail.com",
    "no_kamar": "001",
    "jenis_kelamin": null,
    "telp": "1111",
    "alamat": "Jalan Penyewa 1",
    "image": null,
    "register_date": null,
    "exp_date": null
  },
  {
    "another penyewa" : "..."
  }
}
```

### HTTP Request
`GET http://ditoraharjo.co/keykost/api/v1/penyewa?kost_id=YOUR-KOST-ID`

<!-- END_197edfbef2c1ddadda97abeb410e9fd2 -->

<!-- START_0992d2719020d74bf6cb67a1a8b21f8e -->
## Get One Penyewa

> Example request:

```bash
curl -X GET "http://ditoraharjo.co/keykost/api/v1/penyewa/{id}" \
-H "Accept: application/json"
```

> Example response:

```json
{
    "id": 3,
    "rfid_id": "PENYEWA_1",
    "fullname": "Penyewa 1",
    "email": "penyewa1@gmail.com",
    "no_kamar": "001",
    "jenis_kelamin": null,
    "telp": "1111",
    "alamat": "Jalan Penyewa 1",
    "image": null,
    "register_date": null,
    "exp_date": null,
    "role": {
      "id": 3,
      "name": "Penyewa Kost",
      "created_at": "2017-05-28 11:00:40",
      "updated_at": "2017-05-28 12:52:53",
      "deleted_at": null
    }
}
```

### HTTP Request
`GET http://ditoraharjo.co/keykost/api/v1/penyewa/{id}`


<!-- END_0992d2719020d74bf6cb67a1a8b21f8e -->

<!-- START_51b7c7f127f402a285b23c721762280e -->
## Get Log Penyewa

> Example request:

```bash
curl -X GET "http://ditoraharjo.co/keykost/api/v1/log-penyewa/{id}" \
-H "Accept: application/json"
```

> Example response:

```json
[
  {
    "id": 1,
    "user_id": 3,
    "kost_id": 1,
    "created_at": "2017-05-28 14:32:04",
    "updated_at": "2017-05-28 14:32:04",
    "deleted_at": null
  },
  {
    "another log" : "..."
  }
]
```

### HTTP Request
`GET http://ditoraharjo.co/keykost/api/v1/log-penyewa/{id}`

<!-- END_51b7c7f127f402a285b23c721762280e -->

<!-- START_baa5bf9d8df5d5df0ca3b17436d6eba1 -->
## Create Penyewa

> Example request:

```bash
curl -X POST "http://ditoraharjo.co/keykost/api/v1/penyewa" \
-H "Accept: application/json"
-d '{
"id_pemilikKost" : "5",
"fullname" : "Penyewa 4",
"rfid_id" : "PENYEWA_4",
"no_kamar" : "004",
"email" : "penyewa4@gmail.com",
"telp" : "4444",
"alamat" : "Jalan Penyewa 4"
}'
```

> Example response:

```json
{
  "status" : 200,
  "info" : "Penyewa kost created"
}
```

### HTTP Request
`POST http://ditoraharjo.co/keykost/api/v1/penyewa`


<!-- END_baa5bf9d8df5d5df0ca3b17436d6eba1 -->

<!-- START_596a551c1df9c359ffbcd66db8829a69 -->
## Update Penyewa

> Example request:

```bash
curl -X PATCH "http://ditoraharjo.co/keykost/api/v1/penyewa" \
-H "Accept: application/json"
-d '{
"id" : "5",
"fullname" : "Penyewa 3 update",
"rfid_id" : "PENYEWA_3",
"no_kamar" : "003",
"email" : "penyewa3@gmail.com",
"password" : "4321",
"telp" : "3333",
"alamat" : "Jalan Penyewa 3"
}'
```

> Example response:

```json
{
  "status" : 200,
  "info" : "Penyewa kost updated"
}
```

### HTTP Request
`PATCH http://ditoraharjo.co/keykost/api/v1/penyewa`


<!-- END_596a551c1df9c359ffbcd66db8829a69 -->

<!-- START_1e2435895f5e3ebe4112dc2ea598e2c8 -->
## Delete Penyewa

> Example request:

```bash
curl -X DELETE "http://ditoraharjo.co/keykost/api/v1/penyewa/{id}" \
-H "Accept: application/json"
```

> Example response:

```json
{
  "status" : 200,
  "info" : "Penyewa kost deleted"
}
```

### HTTP Request
`DELETE http://ditoraharjo.co/keykost/api/v1/penyewa/{id}`


<!-- END_1e2435895f5e3ebe4112dc2ea598e2c8 -->

#Kost
<!-- START_6506623798886fe469801f64de62e0cf -->
## Log Kost

> Example request:

```bash
curl -X GET "http://ditoraharjo.co/keykost/api/v1/log-kost/{id}" \
-H "Accept: application/json"
```

> Example response:

```json
[
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:04"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:08"
    },
    {
        "nama": "Penyewa 2",
        "waktu": "28/05/2017 - 14:32:14"
    },
    {
        "nama": "Penyewa 3 update",
        "waktu": "28/05/2017 - 14:32:17"
    },
    {
        "nama": "Penyewa 2",
        "waktu": "28/05/2017 - 14:32:23"
    },
    {
        "nama": "Penyewa 3 update",
        "waktu": "28/05/2017 - 14:32:26"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:32:30"
    },
    {
        "nama": "Penyewa 1",
        "waktu": "28/05/2017 - 14:46:42"
    }
]
```

### HTTP Request
`GET http://ditoraharjo.co/keykost/api/v1/log-kost/{id}`

<!-- END_6506623798886fe469801f64de62e0cf -->
