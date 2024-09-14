---

# PHP E-commerce Platform - Clothing Store

A PHP-based e-commerce platform designed for selling clothes. This project provides a fully functional online store where users can browse products, add them to a shopping cart, place orders, and receive support via a question-based chatbot.
The system includes features like user authentication, order management, product history, product comments, and a fully functional admin panel to manage products, orders, and users.

## Table of Contents
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Contributing](#contributing)
- [License](#license)

## Features
- User Registration/Login, Password Reset using Email Verification
- Product Catalog with Category Filter
- Product History (Tracks and displays user interaction with products)
- Product Comments (Users can leave reviews and feedback on products)
- Shopping Cart (Add, Remove, Edit items)
- Order Management (Order History for Users)
- Send feedback to Admin with Email
- Admin Dashboard (Manage Products, Users, Orders and User Comment)
- Product Statistics ( Statistics by Category and Revenues )
- Payment Integration (Stripe payment)
- Predefined Question-based Chatbot for Customer Support

  
## Tech Stack
- **Backend**: PHP 8.1.10
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Additional Libraries**: jQuery (for UI interactions), fontawsome ( for using icon)
- **Version Control**: Git
- **Hosting Enviroment**: Laragon ( for local development)


## Usage

1. **Access the Website**:
   Open your browser and go to `http://localhost:8000` or your server's URL.

2. **Register an Account**:
   Users can register an account and log in to view and purchase products.

3. **Browse Products**:
   Explore the product catalog, apply filters, and view individual product details.

4. **Shopping Cart**:
   Add items to your cart and proceed to checkout.

5. **Admin Panel**:
   Access the admin dashboard by logging in as an admin. From here, you can manage products, view orders, and update the user list.

## Project Structure
```
/assets            # Contains CSS, JS, and image files
/config            # Configuration files (e.g., database config)
/controllers       # Handles the logic for requests
/models            # Database interaction classes
/views             # HTML templates
/public            # Publicly accessible files (e.g., index.php)
/vendor            # Composer dependencies
```

- **Models**: Handle data interactions with the database.
- **Views**: HTML templates for the user interface.
- **Controllers**: Handle requests and responses.


For more details, refer to the [database documentation](link-to-wiki-database-section).

## Contributing

We welcome contributions! Here's how you can help:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Create a Pull Request.

Please ensure your code follows the PSR-12 coding standard and includes necessary tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---
