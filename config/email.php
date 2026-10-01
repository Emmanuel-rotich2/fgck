<?php
/**
 * FGCK Joyland Email Configuration
 *
 * For Gmail:
 *   EMAIL_SMTP_HOST = 'smtp.gmail.com'
 *   EMAIL_SMTP_PORT = 587
 *   EMAIL_SMTP_ENCRYPTION = 'tls'
 *   EMAIL_SMTP_USERNAME = your Gmail address
 *   EMAIL_SMTP_PASSWORD = your Google App Password (NOT your normal password)
 *
 * For a hosting provider, use the SMTP details supplied by the host.
 */
$localConfig = is_file(__DIR__ . '/local.php') ? require __DIR__ . '/local.php' : [];
$emailConfig = $localConfig['email'] ?? [];
$emailEnabled = getenv('EMAIL_ENABLED');

define('EMAIL_ENABLED', $emailEnabled === false
	? (bool) ($emailConfig['enabled'] ?? false)
	: filter_var($emailEnabled, FILTER_VALIDATE_BOOLEAN));
define('EMAIL_SMTP_HOST', getenv('SMTP_HOST') ?: ($emailConfig['smtp_host'] ?? ''));
define('EMAIL_SMTP_PORT', (int) (getenv('SMTP_PORT') ?: ($emailConfig['smtp_port'] ?? 587)));
define('EMAIL_SMTP_ENCRYPTION', getenv('SMTP_ENCRYPTION') ?: ($emailConfig['smtp_encryption'] ?? 'tls'));
define('EMAIL_SMTP_USERNAME', getenv('SMTP_USERNAME') ?: ($emailConfig['smtp_username'] ?? ''));
define('EMAIL_SMTP_PASSWORD', getenv('SMTP_PASSWORD') ?: ($emailConfig['smtp_password'] ?? ''));
define('EMAIL_FROM_EMAIL', getenv('EMAIL_FROM_EMAIL') ?: ($emailConfig['from_email'] ?? ''));
define('EMAIL_FROM_NAME', getenv('EMAIL_FROM_NAME') ?: ($emailConfig['from_name'] ?? 'FGCK Joyland Appointment System'));
define('EMAIL_REPLY_TO', getenv('EMAIL_REPLY_TO') ?: ($emailConfig['reply_to'] ?? ''));
define('EMAIL_BASE_URL', getenv('EMAIL_BASE_URL') ?: ($emailConfig['base_url'] ?? 'http://localhost/fgck_joyland'));