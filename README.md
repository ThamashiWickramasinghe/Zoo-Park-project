# ZooParc Zoological Park Web Application

## 📌 Project Overview
ZooParc Zoological Park is a database-driven web application developed to provide information about animals, conservation programs, events, and visitor services. The system also supports an online community for volunteers and members, allowing them to register, log in, and participate in educational activities. Administrators can manage events and programs through a secure admin dashboard.

This project is developed as part of an academic web development assignment.

---

## 🎯 Objectives
- Provide visitors with easy access to zoo information and programs
- Promote wildlife conservation and education
- Allow volunteers to register and participate in community activities
- Enable administrators to manage events and programs efficiently

---

## 👥 User Roles
### 1. Visitor (Unregistered User)
- View zoo information
- Search programs and events
- View animal details and conservation information

### 2. Community Member (Registered User)
- Register and log in using email and password
- View scheduled events and programs
- Upload educational information
- Access member dashboard

### 3. Admin
- Secure admin login
- Add, update, and delete events and programs
- Manage community members
- Access admin dashboard

---

## 🗺️ Site Map / Pages
The website contains a minimum of **six main pages**, including:

- **Home** – Overview of ZooParc with images and highlights  
- **About Us** – Zoo history, mission, and conservation efforts  
- **Visit** – Hours, tickets, dining areas, shopping centers  
- **Animals** – Animal categories (Pandas, African species, Asian species, etc.)  
- **Events** – Upcoming programs and scheduled events  
- **Membership / Login** – User registration and login  
- **Admin Dashboard** – Event and program management (Admin only)

---

## 🛠️ Technologies Used
- HTML5
- CSS3
- JavaScript
- PHP (or relevant backend language)
- MySQL (Database)
- Bootstrap (optional)

---

## 🔐 Validations & Security
- Form validation for registration and login
- Secure authentication for users and admin
- Role-based access control
- Input validation to prevent invalid data

---

## 📂 Project Structure (Example)
ZooParc-Zoological-Park/
│
├── index.html                  # Home page
├── about.html                  # About ZooParc
├── visit.html                  # Visit information (hours, tickets, dining)
├── animals.html                # Animal categories and details
├── conservation.html           # Conservation and education info
├── events.html                 # Events and programs
│
├── login.html                  # User login page
├── register.html               # Volunteer / member registration
├── logout.php                  # Logout functionality
│
├── admin/                      # Admin module
│   ├── admin-login.html        # Admin login
│   ├── dashboard.html          # Admin dashboard
│   ├── manage-events.html      # Add / update / delete events
│   ├── manage-programs.html    # Manage programs
│   └── manage-members.html     # View members
│
├── css/                        # Stylesheets
│   ├── style.css
│   └── responsive.css
│
├── js/                         # JavaScript files
│   ├── validation.js
│   └── main.js
│
├── images/                     # Images
│   ├── animals/
│   ├── events/
│   └── zoo/
│
├── database/                   # Database files
│   └── zoo_db.sql
│
├── includes/                   # Reusable components
│   ├── header.php
│   ├── footer.php
│   └── db-connect.php
│
├── README.md                   # Project documentation
└── .gitignore                  # Git ignored files
