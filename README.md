# Loola – Smart Maintenance Scheduling Platform

built to simplify property maintenance through smart automation, scheduling, and contractor coordination.

---

## 📦 Project Structure

- `main-app/` – Core service: authentication, maintenance workflows, APIs
- `analytics-service/` – Handles metrics, reporting, dashboards
- `billing-service/` – Manages job invoicing and subscriptions

---

## 🚀 Phase 1: Main App Development

### 🔧 Project Setup

- [X]  Initialize Laravel project and Git repository
- [X]  Docker setup for local development
- [X]  Configure `.env` with MySQL, Redis, S3

### 🔐 Authentication & Roles

- [X]  User registration and login (Sanctum)
- [ ]  Define and enforce roles: Admin, Manager, Contractor
- [ ]  Role-based middleware and route protection

### 👤 User flow

- [ ]  Contractor flow
  - [ ]  Complete registration
  - [ ]  Validate ID ([didit.me](https://didit.me))
  - [ ]  Approval on plataform
- [ ]  Manager flow
  - [ ]  Complete registration
  - [ ]  Validate email and phone

### 🛠️ Maintenance Request Flow

- [ ]  Create models and migrations for maintenance requests
- [ ]  Tenant request submission API
- [ ]  Status lifecycle: Pending → Assigned → In Progress → Completed
- [ ]  Assign contractors to jobs

### 🗓️ Scheduling & File Uploads

- [ ]  Basic scheduling logic and contractor availability checks
- [ ]  Upload and store images (S3)

### 📣 Notifications & Events

- [ ]  Send email/notification to contractor upon assignment
- [ ]  Emit `JobCompleted` event to SQS when job is finished

### 📊 Dashboard & Admin Tools

- [ ]  Manager dashboard: job list and filters
- [ ]  Admin panel: user and request management

### ✅ Testing & Observability

- [ ]  Add CI/CD (GitHub Actions)
- [ ]  Unit and feature tests for core flows
- [ ]  Request validation with Form Requests
- [ ]  Logging (Laravel Log or CloudWatch)
- [ ]  Error tracking (Sentry)

### 🌐 Deployment

- [ ]  Deploy to staging (ECS/Fargate or similar)
- [ ]  Production deployment pipeline

---

## 💬 Services to be built next:

- **Analytics Service** – Will listen for events and provide job metrics
- **Billing Service** – Stripe + Laravel Cashier for invoicing and subscriptions

---

## 🧪 Tech Stack

- Laravel 12 | PHP 8.4+
- MySQL, Redis
- AWS S3, ECS/Fargate + SQS
- Laravel Cashier, Sanctum
- CI/CD with GitHub Actions

---
