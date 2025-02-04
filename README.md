# gas-by-gas

# GasByGas System Documentation

## Table of Contents
- [Introduction](#introduction)
- [System Overview](#system-overview)
- [Features](#features)
- [Use Case Descriptions](#use-case-descriptions)
- [System Architecture](#system-architecture)
- [Database Design](#database-design)
- [APIs & Integrations](#apis--integrations)
- [Notifications](#notifications)
- [Security Considerations](#security-considerations)
- [Future Enhancements](#future-enhancements)

## Introduction
GasByGas is an automated gas distribution system that enables users to request gas, generate tokens, and receive notifications. The system is designed to optimize gas distribution among outlets and streamline stock management.

## System Overview
The system consists of three main actors:
1. **User** - Registers, logs in, requests gas, and receives notifications.
2. **Outlet Manager** - Manages stock, validates tokens, and handles gas requests.
3. **Admin** - Manages users, outlets, generates reports, and reallocates tokens.

## Features
- User registration & login
- Gas request system
- Token generation
- Stock management
- Notifications via Twilio
- Admin dashboard for reports

## Use Case Descriptions
### 1. **User Registration & Login**
- Users sign up by providing personal details and receive a verification notification.
- Secure login with password hashing.

### 2. **Gas Request & Token System**
- Users request gas, and the system generates a token for pickup.
- Admin manages token approvals and reallocation.

### 3. **Stock Management**
- Outlet managers track stock levels.
- If stock runs low, an automated restock request is triggered.

### 4. **Notification System**
- Users receive SMS notifications about token status.
- Admins & outlet managers are alerted for stock shortages.

## System Architecture
The system follows an MVC architecture with:
- **Frontend:** HTML, CSS, JavaScript (Admin Dashboard & User Interface)
- **Backend:** PHP with MySQL
- **Database:** MySQL relational schema
- **Realtime:** Supabase Realtime for live updates
- **Notifications:** Twilio for SMS alerts

## Database Design
### Tables:
1. `users` - Stores user information.
2. `gas_requests` - Handles gas requests.
3. `tokens` - Manages generated tokens.
4. `stock` - Tracks outlet stock levels.
5. `notifications` - Stores notification logs.

## APIs & Integrations
- **Twilio API** for SMS notifications.
- **Supabase Realtime** for live data updates.

## Notifications
| Event | Notification |
|---|---|
| Gas Request Placed | SMS confirmation to user |
| Token Generated | SMS with pickup details |
| Low Stock Alert | SMS to admin & outlet manager |
| Token Validation | Confirmation to user upon pickup |

## Security Considerations
- **Password Hashing:** Uses `password_hash()` in PHP.
- **SQL Injection Prevention:** Uses prepared statements.
- **Authentication:** Session-based authentication with role-based access control.

## Future Enhancements
- Implement mobile application using **Kotlin & Supabase**.
- Introduce **AI-based stock prediction** for better inventory management.
- Integrate **payment gateway** for online payments.

---

**Author:** GasByGas Development Team
**Version:** 1.0.0

