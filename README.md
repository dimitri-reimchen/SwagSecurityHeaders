# EcomSec Security Headers

**Professional Security Headers Plugin for Shopware 6**

Enhance your Shopware 6 shop's security by adding essential HTTP security headers. This plugin helps protect against common web vulnerabilities like XSS, clickjacking, and MIME-type sniffing attacks.

## Features

✅ **Content Security Policy (CSP)** - Prevent XSS attacks  
✅ **CSP Report-Only Mode** - Test policies before enforcement  
✅ **Permissions Policy** - Control browser features  
✅ **Strict Transport Security (HSTS)** - Force HTTPS connections  
✅ **X-Frame-Options** - Prevent clickjacking  
✅ **X-Content-Type-Options** - Prevent MIME-type sniffing  
✅ **Referrer-Policy** - Control referrer information  

## Requirements

- Shopware 6.6.0 or higher
- PHP 8.1 or higher

## Installation

### Via Composer (Recommended)

```bash
composer require ecomsec/security-headers
bin/console plugin:refresh
bin/console plugin:install --activate EcomSecSecurityHeaders
bin/console cache:clear
```

### Manual Installation

1. Download the plugin
2. Extract to `custom/plugins/EcomSecSecurityHeaders`
3. Install and activate:

```bash
bin/console plugin:refresh
bin/console plugin:install --activate EcomSecSecurityHeaders
bin/console cache:clear
```

## Configuration

Configure the plugin in the Shopware Administration:

**Settings → System → Plugins → EcomSec Security Headers → Configure**

## License

MIT License - See [LICENSE](LICENSE) file for details

## Author

**Dimitri Reimchen**  
EcomSec - E-Commerce Security Solutions

**Email:** contact@ecomsec.io

---

**Made with ❤️ for the Shopware Community**
