# AddressBook.LaravelLumen

## Overview

This repository contains **Address Book** application for Laravel that shows design & coding practices followed by **[Differenz System](http://www.differenzsystem.com/)**.


The app does the following:
1. **Login:** User can login via emailId/password. 
2. **Get All Address:** It will list all the save contacts, having the option to add a new contact.
3. **Create new contact:** User can add a new contact to his address book by filling detail.


## Pre-requisites
-[Visual Studio code](https://code.visualstudio.com/)
-[ Laravel ](https://laravel.com/)
-[ Lumen ](https://lumen.laravel.com/)
-[ MySql ](https://www.mysql.com/)


## Getting Started
1. [Install Visual Studio code](https://code.visualstudio.com/) Editor.
2. Clone this sample repository in to the PHP configuration folder
3. Open Terminal, go to location of the repo
4. Install [Composer](https://getcomposer.org/). If you don't have a composer in the machine.
4. Enter command for install the 'Composer Update' (make sure to go inside project first). It will add required file in the Project.
5. Create database 'address_book' in PhpMyAdmin Panel.
6. Enter Command in CMD 'php artisan migrate' for create table in the database.



## Key Tools & Technologies
- **Database:** MySql
- **Authentication:** login
- **API/Service calls:** fetch API
- **IDE:**  VSCode
- **Framework:** Laravel|lumen

Now call the API one by one.

##API
### Register New user
Registration: 
http://localhost:8181/addressbook/public/api/registerUser

**Request:**
```
    {        
        "first_name":"test",
        "last_name":"test",
        "email_id":"test@diif.com",
        "password":"pass123",
        "c_password":"pass123",
    }
```

**Response:**
```
	{
        "success": 1,
        "data": {
            "first_name": "test",
            "last_name": "test",
            "email_id": "test@gmail.com",
            "password": "pass123",
            "is_active": "1",
            "users_id": 1
        },
        "messsage": "User Register Successfully"
    }
```

###
login:
http://localhost:8181/addressbook/public/api/loginUser

**Request:**
```
    {
        "email_id":"test@gmail.com",
        "password":"pass123"
    }
```
**Response:**
```
    {
       "success": 1,
        "data": "test@gmail.com",
        "messsage": "User Login Successfully"
    }
```
###


Display address by userid:
http://localhost:8181/addressbook/public/api/addressBook/:user_id

**Response:**
```
    {
        "success": 1,
        "data": [
            {
            "users_id": 1,
            "first_name": "up",
            "last_name": "tapsi",
            "contact_no": "123456",
            "email_id": "up@diff.com",
            "is_active": 1
            },
            {
            "users_id": 1,
            "first_name": "test",
            "last_name": "tes",
            "contact_no": "012345678",
            "email_id": "test@diff.email",
            "is_active": 0
            }
        ],
        "message": "success"
    }
```

###
Add Address
http://localhost:8181/addressbook/public/api/add-address/:user_id

**Request:**
```
    {
        "first_name":"test",
        "last_name":"test",
        "email_id":"test@gmail.com",
        "contact_no":"7878985845",
    }
```
**Response:**
```
    {
        "success": 0,
        "data": {
            "first_name": "test",
            "last_name": "test",
            "email_id": "test@gmail.com",
            "contact_no": "0123456987",
            "is_active": "1",
            "addess_book_id": 1
        },
        "message": "Address Added Successfully"
    }
```

###
Update Address
http://localhost:8181/addressbook/public/api/update-address/:address_id

**Request:**
```
    {
        "first_name":"test",
        "last_name":"test",
        "email_id":"test@gmail.com",
        "contact_no":"7878985845",
    }
```

**Response:**
```
    {
    "success": 0,
    "data": 1,
    "message": "Address Updated Successfully"
    }
```

###
Delete Address (Http Method DELETE)
http://localhost:8181/addressbook/public/api/delete-address/:address_id

**Response:**
```
    {
        "success": 0,
        "data": [],
        "message": "Address Deleted Successfully"
    }
```


## Support
If you've found an error in this sample, please [report an issue](https://differenz-system:welcome007@github.com/differenz-system/AddressBook.LaravelLumen.git).  You can also send your feedback and suggestions at info@differenzsystem.com

Happy coding!