# RedLion Development Incorporation

A comprehensive property management and real estate CRM system built with Laravel 11, featuring property listings, customer management, transaction tracking, and reporting.

## ✨ Status

**FEATURE COMPLETE** - All core business functions are fully implemented and working.

- ✅ 67+ Implemented Functions
- ✅ 18 Controllers with full CRUD operations
- ✅ Complete Authentication System
- ✅ Property Management
- ✅ Customer CRM
- ✅ Transaction Tracking
- ✅ Reporting & Analytics
- ⏳ Modern UI Redesign (In Progress)

## 📋 Features

### Authentication & Security
- User registration and login with email verification
- Password reset with email confirmation
- Secure password change with current password verification
- User profile management
- Account deletion

### Property Management
- Full CRUD operations for properties
- Image gallery with multiple uploads
- File management (brochures, floor plans, site plans)
- Property status tracking (draft, published, sold, archived)
- Completion percentage tracking
- View and inquiry counting
- Advanced filtering by category, city, province

### Customer Management
- Customer database with contact information
- Relationship tracking
- Transaction history per customer
- Communication log
- Status management (active/inactive)

### Transaction Management
- Transaction recording and tracking
- Multiple payment method support
- Payment status tracking (pending, paid, failed)
- Invoicing
- Financial reporting

### Communication
- Internal messaging system
- Customer communication tracking
- Message status indicators
- Attachment support (via file storage)

### Reporting & Analytics
- Dashboard with key statistics
- Revenue tracking
- Sales metrics
- Customer insights
- Property performance analysis

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- MySQL/MariaDB 8.0+
- Composer
- Node.js & npm

### Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd redlion
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database in .env**
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=redlion_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations & seeders**
```bash
php artisan migrate:fresh --seed
```

6. **Build assets**
```bash
npm run build
```

7. **Start development server**
```bash
php artisan serve
```

Access at `http://localhost:8000`

## 🏗️ Architecture

### Database Models
- `User` - System users with authentication
- `PropertyListing` - Property records with details
- `Customer` - Customer/client database
- `Transaction` - Financial transactions
- `Message` - Internal communication
- `Project` - Admin project management
- `ProjectImage` - Project image storage

### Controllers (18 Total)
- `AuthenticatedSessionController` - Login/Logout
- `RegisteredUserController` - User registration
- `PasswordController` - Password updates
- `ProfileController` - User profile management
- `DashboardController` - Dashboard statistics
- `PropertyController` - Property CRUD
- `CustomerController` - Customer CRUD
- `TransactionController` - Transaction CRUD
- `MessageController` - Message CRUD
- `ReportController` - Report generation
- Additional auth controllers for security features

### Routes
- 58 total routes
- Public, guest, and protected (auth + verified) middleware groups
- RESTful route conventions
- Custom action routes for business logic

## 📊 API Endpoints

### Public
- `GET/POST /` - Homepage
- `GET /premium-developments` - Featured properties
- `GET /properties` - Browse properties

### Authentication (Guest Only)
- `GET/POST /login` - User login
- `GET/POST /register` - User registration
- `GET/POST /forgot-password` - Request password reset
- `GET/POST /reset-password/{token}` - Reset password

### Protected (Authenticated + Email Verified)
- `GET /dashboard` - Dashboard
- `GET/POST/PUT/PATCH/DELETE /properties/*` - Property management
- `GET/POST/PUT/PATCH/DELETE /customers/*` - Customer management
- `GET/POST/PUT/PATCH/DELETE /transactions/*` - Transaction management
- `GET/POST/PUT/PATCH/DELETE /messages/*` - Messaging
- `GET /reports` - Reporting
- `GET/POST/PUT/PATCH /profile` - User profile
- `PUT /password` - Change password

## 🎨 Modern Design Implementation

The application is being modernized with:
- Dark theme with glassmorphic design
- Gradient backgrounds and smooth animations
- Responsive mobile-first layouts
- Interactive components with Alpine.js
- Modern data tables with sorting/filtering
- Charts and visualization (Chart.js)
- Real-time notifications

See [MODERNIZATION_GUIDE.md](MODERNIZATION_GUIDE.md) for detailed design specifications.

## 📝 Documentation

- [COMPLETE_FUNCTION_AUDIT.md](COMPLETE_FUNCTION_AUDIT.md) - Detailed function audit
- [MODERNIZATION_GUIDE.md](MODERNIZATION_GUIDE.md) - UI/UX modernization roadmap
- [FUNCTION_AUDIT.md](FUNCTION_AUDIT.md) - Function implementation status

## 🧪 Testing

Run tests with:
```bash
vendor/bin/pest
```

Unit tests pass successfully. Feature tests require database session configuration update.

## 🔒 Security Features

- ✅ CSRF protection
- ✅ Password hashing (bcrypt)
- ✅ Email verification
- ✅ Role-based access control
- ✅ Input validation
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ File upload validation
- ✅ Password confirmation for sensitive actions

## ⚙️ Configuration

### Environment Variables
```env
APP_NAME="RedLion Development Incorporation"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/redlion

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=redlion_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### File Storage
- Local disk for development
- Public disk for serving images
- Configure cloud storage in production

## 🚀 Deployment

### Production Configuration
1. Set `APP_DEBUG=false`
2. Configure proper database backups
3. Set up encryption for sensitive data
4. Configure mail service
5. Set up queue processing
6. Enable HTTPS/SSL
7. Configure CDN for static assets
8. Set up monitoring and logging

## 📞 Support

For support, please refer to the documentation or contact the development team.

## 📄 License

Proprietary - RedLion Development Incorporation

---

**Last Updated:** February 26, 2026  
**Status:** Feature Complete ✅  
**Version:** 1.0.0
