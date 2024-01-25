# Web Site using Spring Boot API Service
This website makes use of the Spring Boot API available [here](https://github.com/nachtlz/SpringBoot-API).

## Overview

The website is built on the Model-View-Controller (MVC) architecture, utilizing a router to invoke relevant functions. Each URL is associated with a function in a class. This function performs necessary operations, and the data obtained from this processing (Controller) is sent to a router function called 'render' to display the associated view (View).

## API Interaction

This website relies on an API to fetch the necessary data. Interaction with the API is done using an XML query.

## Getting Started

To use this website, follow these steps:

1. Have the API running. You can find the API [here](https://github.com/nachtlz/SpringBoot-API).

2. Add this project to the `htdocs` folder of XAMPP.

3. Start the Apache and MySQL ports in XAMPP.

4. Access the website by navigating to `localhost/webservice/public`.

Enjoy exploring the functionalities of the website!
