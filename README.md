# PHP Login / Registration Page Example
Login/Registration page example on php, with js (jQuery), html, css.

![License](https://img.shields.io/badge/License-MIT-green)
![PHP](https://img.shields.io/badge/PHP-8.2.12-blue)
![jQuery](https://img.shields.io/badge/jQuery-3.7.0-brightgreen)

## Description

This is an example of registration and authorization in **PHP (v8.2.12)** without using a database **(without checking the password and mail)**. It uses the **JavaScript framework jQuery v3.7.0, html and css**. This is a simple and illustrative example to find out how it all works.

## Features

- Password verification (minimum 4 characters)
- Agreement with the terms of use
- Checking the mail (with a regular expression)
- Hiding the password.

## Necessary dependencies

- PHP v8.2.x.
- A utility to run a local server.

## Run project

1. Install [**XAMPP**](https://www.apachefriends.org/) or another utility to run a local server.
2. If you selected [**XAMPP**](https://www.apachefriends.org/), then unzip this project to the **htdocs** folder in the **XAMPP directory**.
3. Open [**XAMPP**](https://www.apachefriends.org/) and click the **Start** button next to the **Apache module**.
4. Go to the address in your browser **http://localhost**.

## Project structure

```
php-login-page-example/
├── src/
│ ├── js/
│ │ ├── login.js
│ │ └── register.js
│ ├── css/
│ │ └── main.css
├── index.php
├── register.php
├── .htacesss
└── README.md
```

## License

This project is licensed under the MIT license. Details can be found in the `LICENSE` file.