# Canteen Management System: Optimizing Food Ordering and Inventory Management with PHP and MySQL

The Canteen Management System (CMS) is a web-based application designed to streamline the process of food ordering and management within an educational institution's canteen. Developed as a project for the CS213 SSL course, CMS offers a user-friendly interface for both customers and canteen owners to interact with.

## Features

### For Customers
- **Login and Registration:** New users can register, while existing users can login with their credentials.
- **View Menu:** Customers can view the canteen menu along with item details such as name, price, and type (Veg/Non-veg).
- **Place Orders:** Customers can add desired items to their cart and specify the quantity.
- **Payment Options:** Customers can choose to pay via UPI or cash.

### For Canteen Owners
- **Menu Management:** Owners can modify the menu and change the availability status of items.
- **Order Management:** Owners can view details of all orders placed and check payment statuses.

## Setup

To set up the Canteen Management System, follow these steps:

1. **Start XAMPP:** Start the XAMPP control panel and ensure that both Apache and MySQL services are running.

2. **Clone the repository:** Clone the project repository to your local machine.

3. **Move files to XAMPP's htdocs directory:**
   - Copy the entire cloned repository folder and paste it into the `htdocs` directory in your XAMPP installation folder.

4. **Database Initialization:**
   - Open your web browser and navigate to `http://localhost/canteen-management-system/init/init.php`. This will initialize the database and set up necessary tables.

5. **Access the application:** After the database initialization is complete, navigate to `http://localhost/canteen-management-system/home/home.php` in your web browser.

6. **Usage:** Once the home page is loaded, you can register/login as a customer or access the canteen owner portal to manage the menu and view orders.

## Dependencies

- XAMPP: Apache and MySQL server environment.
- Web Browser: Chrome, Firefox, Safari, etc.

## Demo Video

Check out the demo video of the Canteen Management System [here](https://www.youtube.com/watch?v=w6E4-1OChbA).

## Usage

1. **Customer Portal:**
   - Register/Login with your credentials.
   - Browse the menu, add items to your cart, and place orders.
   - Choose your preferred payment method.

2. **Canteen Owner Portal:**
   - Login with your credentials.
   - Manage the menu, update item availability.
   - View all orders and check payment statuses.

## Team Members

- Sanchi Sujith Kumar 
- Vivek Sunil Gaikwad
- Akella Vyaghra Satya Sreenivasu 
- Derangula Mahesh

## Contributing

We welcome contributions from the community! If you'd like to contribute to the project, please fork the repository, create a new branch for your feature, make your changes, and then submit a pull request.
