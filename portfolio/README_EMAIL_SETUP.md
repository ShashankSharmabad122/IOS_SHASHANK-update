# Setting Up EmailJS for Your Portfolio Contact Form

This guide will help you set up EmailJS to send messages from your contact form directly to your email.

## Step 1: Create an EmailJS Account

1. Go to [EmailJS](https://www.emailjs.com/) and sign up for a free account
2. The free plan allows 200 emails per month, which should be sufficient for a portfolio site

## Step 2: Create an Email Service

1. After signing in, go to the "Email Services" tab
2. Click "Add New Service"
3. Choose your email provider (Gmail, Outlook, etc.)
4. Follow the instructions to connect your email account
5. Name your service (e.g., "portfolio_contact")

## Step 3: Create an Email Template

1. Go to the "Email Templates" tab
2. Click "Create New Template"
3. Design your email template. Here's a simple example:

**Subject:**
```
New Contact Form Submission from {{from_name}}
```

**Content:**
```
Name: {{from_name}}
Email: {{from_email}}

Message:
{{message}}
```

4. Save your template and note the Template ID

## Step 4: Update Your Code

The code has already been updated with your EmailJS credentials:

- User ID: vtE1Mops9vGjieUYP
- Service ID: service_shashank
- Template ID: template_hxnd2u4

```javascript
emailjs.init("vtE1Mops9vGjieUYP");
emailjs.send('service_shashank', 'template_hxnd2u4', templateParams)
```

## Step 5: Test Your Form

1. Open your portfolio website
2. Fill out the contact form and submit it
3. Check your email to make sure you received the message

## Troubleshooting

- If emails aren't being sent, check the browser console for error messages
- Verify that your EmailJS account is active and that you haven't exceeded the free tier limits
- Make sure your email service is properly connected

## Security Note

The current implementation uses client-side JavaScript, which means your EmailJS User ID is visible in the code. This is generally acceptable for a portfolio site, but be aware that someone could potentially use your ID to send emails through your account.

For a more secure implementation, consider using a server-side solution in the future.