# Test Skill Elimspro
## Requirement
- PHP >= 7.2
- Composer
- Apache / Nginx

## Installation

``` bash
# install composer dependencies
$ composer install
# run migration and seed
$ php artisan migrate --seed
# run manually
$ php artisan serve
```

## Login Credential
```
Email: admin@admin.com
Password: password
```

## Dotenv Configuration
### Database Configuration
Please make a fresh database and edit this configuration in .env file. Make sure the database credential is correct
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

# **API Documentation**

## **Authentication**
Use **Basic Authentication** with these credentials:  
- **Email**: `admin@admin.com`  
- **Password**: `password`  

---

## **1. GET `/api/company`**
Retrieve the list of companies.

### **Response Example**  
```json
{
  "status": "success",
  "message": "Data retrieved successfully.",
  "data_count": 12,
  "data": [
    {
      "id": 1,
      "name": "Barton PLC",
      "address": "8052 Brielle Branch Suite 692\nSouth Piperville, AL 98414",
      "email": "bmueller@kerluke.com",
      "created_at": "2024-12-05 08:49:32",
      "updated_at": "2024-12-05 08:49:32"
    }
  ]
}
```

---

## **2. POST `/api/company`**
Create a new company.

### **Request Body**  
```json
{
  "name": "PT. Elimspro Semarang",
  "address": "Semarang, Jawa Tengah Indonesia",
  "email": "admin@elimspro.com"
}
```

### **Response Example**  
```json
{
  "message": "Company created successfully!",
  "employee": {
    "name": "PT. Elimspro Semarang",
    "address": "Semarang, Jawa Tengah Indonesia",
    "email": "admin@elimspro.com",
    "updated_at": "2024-12-07 01:22:11",
    "created_at": "2024-12-07 01:22:11",
    "id": 16
  }
}
```

---

## **3. GET `/api/employees`**
Retrieve the list of employees, including their company details.

### **Response Example**  
```json
{
  "status": "success",
  "message": "Data retrieved successfully.",
  "data_count": 52,
  "data": [
    {
      "id": 1,
      "first_nm": "Mellie",
      "last_nm": "Kunde",
      "company_id": "1",
      "email": "woodrow21@example.org",
      "phone": "870-731-6590 x07931",
      "created_at": "2024-12-05 08:49:32",
      "updated_at": "2024-12-05 08:49:32",
      "company": {
        "id": 1,
        "name": "Barton PLC",
        "address": "8052 Brielle Branch Suite 692\nSouth Piperville, AL 98414",
        "email": "bmueller@kerluke.com",
        "created_at": "2024-12-05 08:49:32",
        "updated_at": "2024-12-05 08:49:32"
      }
    }
  ]
}
```

---

## **4. POST `/api/employees`**
Create a new employee.

### **Request Body**  
```json
{
  "first_nm": "Nelda",
  "last_nm": "Wisoky",
  "company_id": "1",
  "email": "karen76@example.com",
  "phone": "992-415-0110"
}
```

### **Response Example**  
```json
{
  "message": "Employee created successfully!",
  "employee": {
    "first_nm": "Nelda",
    "last_nm": "Wisoky",
    "company_id": "1",
    "email": "karen76@example.com",
    "phone": "992-415-0110",
    "updated_at": "2024-12-07 01:30:40",
    "created_at": "2024-12-07 01:30:40",
    "id": 54
  }
}
```

---

## **Quick Steps with Postman**
1. Use **GET** or **POST** method.  
2. Go to the **Authorization** tab, select **Basic Auth**, and provide the email and password.  
3. For **POST**, add the JSON body in the **Body** tab.  
4. Click **Send** to test the API.

--- 
