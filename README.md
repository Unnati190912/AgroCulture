# AgroCulture E-Commerce Platform

AgroCulture is a web-based e-commerce platform that connects farmers directly with buyers, facilitating the trade of agricultural products. The platform aims to eliminate intermediaries and create a more efficient marketplace for agricultural goods.

## Features

- **User Authentication System**
  - Separate registration for farmers and buyers
  - Secure login system
  - Profile management

- **Product Management**
  - Farmers can list their products
  - Product categorization (Fruits, Vegetables, Grains, etc.)
  - Product image upload
  - Price setting and inventory management

- **Shopping Features**
  - Shopping cart functionality
  - Secure checkout process
  - Order history
  - Product reviews and ratings

- **Additional Features**
  - Blog system for agricultural insights
  - Product search and filtering
  - Responsive design for mobile devices

## Technology Stack

- **Frontend**
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
  - jQuery

- **Backend**
  - PHP
  - MySQL Database

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/navaaz30/AgroCulture.git
   ```

2. Set up your XAMPP/WAMP environment:
   - Place the project in your `htdocs` folder
   - Start Apache and MySQL services

3. Database Setup:
   - Create a new database named 'agroculture'
   - Import the provided `agroculture.sql` file

4. Configure Database Connection:
   - Update `db.php` with your database credentials
   ```php
   $conn = mysqli_connect('localhost', 'username', 'password', 'agroculture');
   ```

5. Access the application:
   - Open your browser and navigate to `http://localhost/AgroCulture`

## Directory Structure

```
AgroCulture/
├── css/                  # Stylesheet files
├── js/                   # JavaScript files
├── images/              # Image assets
├── Login/               # Authentication related files
├── bootstrap/           # Bootstrap framework files
├── db.php              # Database configuration
├── index.php           # Main entry point
└── README.md           # Project documentation
```

## Usage

1. **For Farmers:**
   - Register as a farmer
   - Add products with details and images
   - Manage inventory and prices
   - Track orders and communications

2. **For Buyers:**
   - Register as a buyer
   - Browse available products
   - Add items to cart
   - Complete checkout process
   - Track orders

## Security Features

- Password hashing
- SQL injection prevention
- XSS attack prevention
- Session management
- Input validation and sanitization

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contact

Your Name - [@unnati190912](https://github.com/Unnati190912/AgroCulture/edit/main/README.md#L117C52)

Project Link:[Agroculture](https://github.com/Unnati190912/AgroCulture/edit/main/README.md#L117C52)
