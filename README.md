# Email Scheduler with PHPMailer

This project is a simple and efficient email scheduler built using PHP and PHPMailer. It allows users to send emails by filling out a contact form, which includes fields for the sender's name, recipient's email address, subject, and message. Upon form submission, the email is sent to the specified recipient using the PHPMailer library.

## Features

* **User-Friendly Contact Form**: A form for submitting emails, including fields for the sender's name, recipient's email address, subject, and message.
- **PHPMailer Integration**: Utilizes PHPMailer for sending emails, ensuring reliable delivery and support for HTML content.
- **SMTP Configuration**: Configured to use Gmail's SMTP server for secure email sending.
- **Dynamic Recipient**: Users can specify the recipient's email address through the contact form.
- **Feedback Notifications**: Alerts the user with success or error messages upon form submission.

## Installation

1. **Clone the repository** to your local machine:
   ```bash
   git clone https://github.com/your-username/email-scheduler-phpmailer.git

2. Navigate to the project directory:
   ```bash
   cd email-scheduler-phpmailer

3. Install PHPMailer via Composer (if not already installed):
   ```bash
   composer require phpmailer/phpmailer

4. Configure your SMTP settings in mail.php.

## Usage
- Run the project on a local server (e.g., XAMPP).
- Open the project in your web browser.
- Fill out the contact form with your name, recipient's email address, subject, and message.
- Submit the form to send the email.
  
## Dependencies
- PHP
- PHPMailer
- Composer
