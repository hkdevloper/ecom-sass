### Project Summary

**Project Name:** Medical Store E-commerce Application

**Objective:** To create an online e-commerce platform for medical stores where multiple stores can register and manage their products, orders, and inventory. Customers can browse and purchase products, track orders, and make custom orders with prescription uploads. The platform will offer region-specific product visibility and free delivery for orders over 500 INR.

**Technologies Used:**
- **Frontend:** Flutter
- **Backend:** Laravel
- **Database:** MySQL
- **Storage:** Personal VPS for media files
- **Location Services:** Google Maps API
- **Payment Gateway:** Razorpay or similar

# How to run the project 
## Backend - Laravel 
1. Clone the repository 
2. Run `composer install` to install the dependencies 
3. Create a `.env` file by copying the `.env.example` file 
4. Run `php artisan key:generate` to generate the application key
5. Run `php artisan migrate` to migrate the database tables 
6. Run `php artisan db:seed` to seed the database with sample data 
7. Run `php artisan serve` to start the Laravel development server 
8. The backend will be running on `http://localhost:8000`
9. You can access the API documentation at `http://localhost:8000/api/documentation` 
10. You can access the admin panel at `http://localhost:8000/admin`

## Frontend - Flutter 
1. Clone the repository 
2. Open the `flutter_app` directory in a code editor 
3. Run `flutter pub get` to install the dependencies 
4. Update the API URL in the `lib/utils/constants.dart` file 
5. Run `flutter run` to start the Flutter application 
6. The application will be running on the connected device or emulator 
7. You can now register, login, and use the application 
8. You can access the admin panel at `http://localhost:8000/admin` to manage the data
9. You can access the API documentation at `http://localhost:8000/api/documentation` to view the available endpoints

### Key Features

1. **User Registration and Authentication**
    - Sign-up, login, logout
    - Email verification and password recovery
    - Role-based access control (admin, store manager, customer)

2. **Store Management**
    - Store registration and profile management
    - Store location management
    - Dashboard for store owners

3. **Product Management**
    - Add, edit, delete products
    - Product categories and tags
    - Upload product images
    - Set regional availability

4. **Inventory Management**
    - Track stock levels
    - Low stock alerts
    - Inventory reports

5. **User Location Tracking**
    - Geolocation tracking using Google Maps API
    - Show products available in the user's region

6. **Order Management**
    - Shopping cart functionality
    - Order placement and confirmation
    - Free delivery for orders above 500 INR
    - Custom order feature with prescription upload
    - Order tracking and history

7. **Billing System**
    - Generate invoices
    - Apply discounts and promo codes
    - Payment gateway integration

8. **Notifications**
    - Push notifications for order status updates
    - Email and SMS notifications

9. **Reports and Analytics**
    - Sales reports
    - Customer analytics
    - Inventory reports

### Detailed Workflows

1. **User Registration and Login:**
    - Users sign up with email verification and login to access features based on their roles.

2. **Product Management:**
    - Store managers add products with details and images, setting regional availability for better user targeting.

3. **Order Placement:**
    - Customers add products to the cart, proceed to checkout, and place orders. Orders over 500 INR get free delivery.

4. **Custom Orders:**
    - Customers upload prescriptions for products they cannot find. Store managers process these custom orders.

### Development Process

1. **Project Planning:**
    - Define requirements, scope, and timeline with milestones.

2. **System Design:**
    - Design architecture, database schema, APIs, and UI/UX.

3. **Implementation:**
    - Develop frontend in Flutter and backend in Laravel, integrating MySQL and VPS for media storage.

4. **Testing:**
    - Conduct unit and integration testing to ensure functionality and performance.

5. **Deployment:**
    - Deploy the application on a suitable VPS, ensuring security and scalability.

### Detailed Workflow for Main Features

#### Registration and Authentication
- **Frontend:** Flutter
- **Backend:** Laravel with JWT for authentication
- **Database:** User table with details and roles
- **Workflow:** User signs up, receives an email verification link, verifies email, and logs in.

#### Product Management
- **Frontend:** Flutter with forms and image picker
- **Backend:** Laravel with endpoints for CRUD operations
- **Database:** Products table with fields for name, description, price, image URL, and region

#### Order Management
- **Frontend:** Flutter with cart functionality
- **Backend:** Laravel with order processing logic
- **Database:** Orders table with order details and status
- **Workflow:** User adds products to the cart, places an order, and receives order status updates.

#### Billing System
- **Frontend:** Flutter with payment gateway integration
- **Backend:** Laravel with Razorpay integration
- **Workflow:** User completes payment for the order through the integrated payment gateway.

#### Notifications
- **Frontend:** Flutter with push notification support
- **Backend:** Laravel with notification logic
- **Workflow:** User receives push notifications for order status updates.

### Additional Considerations
- **Testing:** Implement unit testing and integration testing for the application.
- **Security:** Ensure secure data transmission and storage, especially for sensitive information like user details and payment info.
- **Performance Optimization:** Optimize the application for performance, considering the potential high volume of users and data.
- **Scalability:** Design the system to be scalable, allowing the addition of more features and handling increased loads as more stores and users join the platform.

### Future Enhancements
- **Machine Learning:** Implement recommendation systems based on user preferences and purchase history.
- **Chat Support:** Integrate chat support for customers to interact with store managers.
- **Voice Search:** Add voice search functionality for users to search for products.
- **Subscription Model:** Implement a subscription model for customers to receive regular supplies of medicines.
- **Offline Mode:** Allow users to access the app and place orders in offline mode, syncing data when online.
- **AR Integration:** Implement augmented reality features for users to visualize products before purchase.
- **Social Media Integration:** Allow users to share products on social media platforms.
- **Feedback System:** Implement a feedback system for users to rate products and services.
- **Localization:** Add multilingual support for users from different regions.
- **Accessibility:** Ensure the application is accessible to users with disabilities.
- **Data Analytics:** Implement data analytics to track user behavior and improve the platform.

### Project Timeline 
- **Week 1:** Project planning, requirements gathering, and system design. 
- **Week 2-3:** Frontend development in Flutter and backend development in Laravel. 
- **Week 4:** Integration of frontend and backend, testing, and bug fixing. 
- **Week 5:** Deployment on a suitable VPS, final testing, and user acceptance testing. 
- **Week 6:** Final review, documentation, and project submission. 
- **Week 7:** Post-launch support and maintenance. 
- **Week 8:** Future enhancements and updates. 
- **Week 9:** Final review and project closure. 
- **Week 10:** Project handover and knowledge transfer. 
- **Week 11:** Feedback collection and analysis. 
- **Week 12:** Project evaluation and lessons learned. 
- **Week 13:** Final report submission.
- **Week 14:** Project presentation and demo.

## Project Plan 
### Week 1: Project Planning and System Design 
- Define project scope, objectives, and requirements. 
- Create a detailed project plan with milestones and timelines.
- Design system architecture, database schema, and APIs.
- Develop wireframes and UI/UX design for the application.
- Finalize technologies and tools for development.
- Assign roles and responsibilities to team members.
- Set up project management tools for collaboration and tracking.
- Conduct a kickoff meeting with the team to discuss the project plan.
- Review and finalize the project plan with stakeholders.
- Prepare documentation for the project plan and system design.

### Week 2-3: Frontend and Backend Development
- Set up the development environment for Flutter and Laravel.
- Develop the frontend in Flutter with user registration and login screens.
- Implement user authentication using JWT in Laravel.
- Create API endpoints for user registration, login, and authentication.
- Develop the product management module in Flutter with CRUD operations.

### Week 4: Integration and Testing
- Integrate the frontend and backend modules.
- Test the application for functionality and performance.
- Conduct unit testing for frontend and backend components.

### Week 5: Deployment and Final Testing
- Deploy the application on a suitable VPS.
- Conduct final testing and bug fixing.
- Perform user acceptance testing with stakeholders.

### Week 6: Final Review and Documentation
- Review the application for quality and performance.
- Prepare documentation for the application.
- Create user manuals and guides for the application.

### Week 7: Post-launch Support and Maintenance
- Provide support to users for issue resolution.
- Monitor the application for performance and security.

### Week 8: Future Enhancements and Updates
- Implement additional features and enhancements.
- Release updates and patches for the application.
- Collect feedback from users for future improvements.

### Week 9: Final Review and Project Closure
- Review the project for completion and success.
- Prepare a final report on the project.

### Week 10: Project Handover and Knowledge Transfer
- Hand over the project to stakeholders.

### Week 11: Feedback Collection and Analysis
- Collect feedback from stakeholders and users.
- Analyze feedback for future improvements.
- Implement changes based on feedback.

### Week 12: Project Evaluation and Lessons Learned
- Evaluate the project for success and lessons learned.
- Document the project evaluation and lessons learned.

### Week 13: Final Report Submission
- Prepare and submit the final report on the project.

### Conclusion 
The Medical Store E-commerce Application project aims to provide a comprehensive online platform for medical stores to manage their products and orders efficiently while offering customers a user-friendly shopping experience.

The project will leverage technologies like Flutter, Laravel, MySQL, and Google Maps API to create a robust e-commerce platform with features like user registration, product management, order placement, custom orders, billing system, notifications, and more. 

The development process will follow a structured approach, including project planning, system design, implementation, testing, and deployment.

By following this structured approach, the project aims to deliver a robust e-commerce platform tailored to the needs of medical stores and their customers, with a focus on usability, security, and performance.
