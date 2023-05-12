-:Splice Laravel Project End Points:-

Basic Steps Follow:-
1) User have to register first.
2) After registered user login for user.
3) Login user will generate autorization key in response
4) For Get Producst you need to use generated authorization key 
5) User can add new products

1) Register User:-

https://prnt.sc/tfj3oR2EE6AX

Endpoint : http://localhost:8000/api/custom-registration
name : JohnSmith
email: JohnSmith@gmail.com
password:JohnSmith@123

2) Login User :- 

https://prnt.sc/-JGxiescyDp5

Endpoint : http://localhost:8000/api/custom-login
email: JohnSmith12@gmail.com 
password: JohnSmith@123

3) Get Product Data :- 

https://prnt.sc/aPPr8TwGkgZv

Endpoint : http://localhost:8000/api/products
Accept : application/json
Authorization :  Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTY2MjU2NWMyYTVhNjNmMjcwYjAzZWM1MWJlMTIwYzRmNDVmNjA4NDgwNzQ5NzQ5YWFmODc2OWNkYmM0ZmUxOGVkNGFhYTM1MTI4NmM1NjkiLCJpYXQiOjE2ODM4NjMzMDIuNjg0MTc4LCJuYmYiOjE2ODM4NjMzMDIuNjg0MTgsImV4cCI6MTcxNTQ4NTcwMi42Nzc4NjksInN1YiI6IjE0Iiwic2NvcGVzIjpbXX0.NqKQLrpGugHFcfKXbJL8RXEQ8kCuHAmZjn0hRKOpjJm9ePyKON0wXCYzpL8P5TIubwcRwYQx89vPWPHd9tNe9Tt3ru8i0kXJ8GoJBJqw00CN02KkMkCLXIcSUz7e-8qV_NIfRnUvQM2iWFb7WVVCpL5XADGGJBXV-glbNWewwSyEAuYxkyXyd1-eeBcfDjF6WZc884SQw4M-5IP5BXAr0HeRe0gpRq5Hy6mm3waGbyTTWaWWo9Bq2R6mrGZK4ztMQwvHPM-fyhMH5RnMEMsePobbdQEuh8s7zq4ltdeob3ncMjiVWGT-rIyiDlP6Z_BYyD0EFfhnz2mbleAsbzwVLZCRlKLwz0NwP6H6J7dVzT0XGIObLA4w4xPBjTQa_8qpad4ijQGOD0Gg6zkWFdjcuhIQd98HEOqYZYN-E92pfK88z3ZuoKJ3gf0s6b6tl2dT1sr7vcHnCx57CtG7tSt6XCzLob0BrXKi1jt5XJeZhirhuLYZUwsWKEeUWBcIM_UiOZ1LmFtlj5dGLpT3YfTdCVI9ADDwRoidiO9Lbg6hylEPHip8YnYkRwEARWPrIJ7HC-BMCOukhablWSd2P6x_PCTtnPtdal9miz9brgk5vnUuNPQNOavevVDU7sC-F39daDE2UTLd5zU-faf-TQi4b5Zs7PJkL4dyV-PSTaA5cOI


4) Add Product Data :- 

https://prnt.sc/-cwxM1GocLDX

Endpoint : http://localhost:8000/api/products
name : Laptop
description : Laptop Product
price : 200
quantity :  2
image : C:\Users\OneDrive\Desktop\Laptop.png

