# Custom Block Theme

A modern WordPress block theme built with Tailwind CSS, following the three-layer architecture pattern.

## Features

- Full Site Editing (FSE) support
- Tailwind CSS 4.x integration
- Three-layer architecture (Patterns → Template Parts → Templates)
- Update once, changes everywhere
- Modern development workflow

## Installation

1. Clone or download this theme into your `wp-content/themes/` directory
2. Navigate to the theme directory:
   ```bash
   cd wp-content/themes/custom-block-theme
   ```
3. Install dependencies:
   ```bash
   npm install
   ```
4. Build Tailwind CSS:
   ```bash
   npm run build
   ```
5. Activate the theme in WordPress Admin

## Development

### Watch for changes (Tailwind only)
```bash
npm run tailwindwatch
```

### Watch with live reload (requires browser-sync configuration)
```bash
npm run preview
```

### Build for production
```bash
npm run build
```

## Architecture

This theme follows the **three-layer architecture pattern**:

```
Patterns (patterns/*.php) - Contains actual blocks and styling
    ↓ Referenced by
Template Parts (parts/*.html) - Just references to patterns
    ↓ Included in
Templates (templates/*.html) - Page structures
```

**Key Principle:** Update pattern files to automatically update all pages using that pattern.

See [STRUCTURE.md](./STRUCTURE.md) for detailed documentation.

## File Structure

```
custom-block-theme/
├── style.css                 # Theme header (required)
├── theme.json               # Configuration (required)
├── functions.php            # PHP functions (required)
├── package.json             # npm dependencies
├── README.md                # This file
├── STRUCTURE.md             # Detailed documentation
├── .gitignore              # Git exclusions
├── templates/              # Page templates
│   ├── index.html          # Fallback template
│   ├── page.html           # Default page
│   └── front-page.html     # Homepage
├── parts/                  # Template parts
│   ├── header.html         # Header part
│   └── footer.html         # Footer part
├── patterns/               # Block patterns
│   ├── header.php          # Header pattern
│   └── footer.php          # Footer pattern
├── src/                    # Source files
│   └── index.css          # Tailwind source
├── build/                  # Compiled files (generated)
│   └── index.css          # Compiled CSS
└── assets/                 # Static assets
    ├── images/
    ├── fonts/
    └── js/
```

## Customization

### Colors

Edit colors in `theme.json` and `src/index.css`:

```json
// theme.json
"color": {
  "palette": [
    {
      "slug": "primary",
      "color": "#0066cc",
      "name": "Primary"
    }
  ]
}
```

### Typography

Edit fonts in `theme.json` and update Google Fonts in `functions.php`.

### Patterns

Edit pattern files in `patterns/` to update styling across all pages using that pattern.

## Requirements

- WordPress 6.0+
- PHP 8.0+
- Node.js 18+
- npm

## License

GNU General Public License v2 or later

## Support

For detailed documentation on the three-layer architecture and best practices, see [STRUCTURE.md](./STRUCTURE.md).
