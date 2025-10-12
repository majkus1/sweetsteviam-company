# SWEETSTEVIAM - Natural Sweeteners Wholesale

A modern, SEO-optimized business card website for a natural sweeteners wholesale company operating in Poland and the EU.

🌐 **Live Website:** [sweetsteviam.com](https://sweetsteviam.com)

## 🌟 About

SWEETSTEVIAM is a professional website showcasing wholesale natural sweeteners including:
- Stevia Rebaudiana Bertoni
- Erythritol
- Xylitol
- Sucralose
- Sorbitol
- And other sugar alternatives

## 🚀 Features

### SEO Optimization
- **Clean URLs** - No `.html` extensions in URLs (e.g., `/products/stevia` instead of `/products/stevia.html`)
- **Sitemap.xml** - Auto-updated with current dates for better indexing
- **Schema.org markup** - Rich snippets for products and organization
- **Meta tags** - Optimized titles, descriptions, and Open Graph tags
- **Hreflang tags** - Bilingual support (English/Polish)
- **Google-friendly caching** - Proper cache headers for optimal indexing

### Anti-Spam Protection
The contact form includes multiple layers of spam protection:
- **Honeypot field** - Hidden field that bots auto-fill
- **Timestamp validation** - Prevents too-fast submissions (< 3 seconds)
- **Form expiration** - Forms expire after 1 hour
- **Server-side validation** - Additional PHP validation

### Performance
- **WebP images** - Modern image format for faster loading
- **Font optimization** - Local fonts (Open Sans)
- **CSS minification** - Optimized stylesheets
- **Gzip compression** - Enabled via `.htaccess`
- **Browser caching** - Static assets cached for 1 year

### Multilingual Support
- **English version** - Main site at `/`
- **Polish version** - Available at `/pl/`
- **Consistent navigation** - Language switcher on every page

## 📁 Project Structure

```
SweetSteviam/
├── index.html              # Homepage (EN)
├── about-us.html           # About page (EN)
├── contact.html            # Contact page with form (EN)
├── service.html            # Services page (EN)
├── wyslij.php              # Contact form handler
├── .htaccess               # Apache configuration
├── sitemap.xml             # SEO sitemap
├── robots.txt              # Search engine directives
├── products/               # Product pages (EN)
│   ├── stevia-rebaudiana-bertoni.html
│   ├── erythritol.html
│   ├── xylitol.html
│   ├── sucralose.html
│   └── ...
├── pl/                     # Polish version
│   ├── index.html
│   ├── kontakt.html
│   ├── produkty/
│   └── ...
├── blog/                   # Blog articles
├── img/                    # Images and assets
├── fonts/                  # Web fonts
└── vendor/                 # PHPMailer library
```

## 🛠️ Technologies

- **HTML5** - Semantic markup
- **CSS3** - Modern styling
- **JavaScript/jQuery** - Form validation and interactivity
- **PHP** - Contact form processing
- **PHPMailer** - Email sending library
- **Apache** - Web server with mod_rewrite

## 📧 Contact Form

The contact form (`wyslij.php`) uses the native PHP `mail()` function for simplicity and compatibility with shared hosting environments.

### Form Fields
- Name (required)
- Company (required)
- Email (required)
- Phone (optional)
- Message (required, min 10 characters)

### Anti-Spam Features
```php
// Honeypot field check
if (!empty($_POST['website'])) {
    die('Spam detected.');
}

// Timestamp validation
if ($timeDiff < 3) {
    die('Form submitted too quickly.');
}
```

## 🔧 Installation

1. Clone or upload files to your web server
2. Ensure Apache `mod_rewrite` is enabled
3. Configure `.htaccess` if needed
4. Update contact form email addresses in `wyslij.php`
5. Test contact form functionality

## 📝 Configuration

### .htaccess Features
- HTTPS redirect
- www to non-www redirect
- Clean URLs (removes `.html` extensions)
- Cache control headers
- Gzip compression

### Sitemap
- Update `sitemap.xml` dates when content changes
- Submit to Google Search Console for indexing

## 🌐 SEO Best Practices

- ✅ No redirect chains (fixed "Page contains redirect" issue)
- ✅ Proper canonical URLs
- ✅ Mobile-responsive design
- ✅ Fast page load times
- ✅ Structured data markup
- ✅ Alt tags on all images
- ✅ Breadcrumb navigation

## 📊 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📄 License

© 2025 SWEETSTEVIAM. All Rights Reserved.

## 👤 Contact

**Mümtaz Aras Consulting and Marketing Company**
- Email: office@sweetsteviam.com
- Website: https://sweetsteviam.com
- Location: Poland, EU

---

**Note:** This is a production-ready website optimized for search engines and user experience. All forms are protected against spam, and the site follows modern web standards and SEO best practices.
