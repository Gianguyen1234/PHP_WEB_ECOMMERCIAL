---

# PHP E-commerce Platform - Clothing Store

A PHP-based e-commerce platform designed for selling clothes. This project provides a fully functional online store where users can browse products, add them to a shopping cart, place orders, and receive support via a question-based chatbot.
The system includes features like user authentication, order management, product history, product comments, and a fully functional admin panel to manage products, orders, and users.

## Notice!
- This project is using Procedural PHP . I don't use any Frameworks like Laravel or Symfony in here. 

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
   Users can register an account and log in to comment and purchase products.

3. **Browse Products**:
   Explore the product catalog, apply filters, and view individual product details.

4. **Shopping Cart**:
   Add items to your cart and proceed to checkout.

5. **Admin Panel**:
   Access the admin dashboard by logging in as an admin. From here, you can manage products, view orders, and update the user list.

## Project Structure
```
/admin            # for admin 
/css              # for CSS styles
/images           # for slide images
/model            # Database interaction using PDO
/uploads          # for storing product images
/vendor           # Composer dependencies
/view             # UI templates ( also UI logic)
/index (Controller)            # handles the logic between Model and View

```

- **Models**: Handle data interactions with the database.
- **Views**: HTML templates for the user interface.
- **Controllers**: Handle requests and responses.


For more details, refer to the [database documentation](link-to-wiki-database-section).

## Contributing

Welcome to contributions! Here's how you can help:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Create a Pull Request.

---
