# WordPress Block Theme Structure Guide

**A systematic approach to building maintainable WordPress block themes with Tailwind CSS**

**Key Principle:** Update once, changes everywhere. Avoid pattern copy-paste hell.

---

## Table of Contents

1. [Core Concept](#core-concept)
2. [Initial Setup](#initial-setup)
3. [File Structure](#file-structure)
4. [Tailwind CSS Setup](#tailwind-css-setup)
5. [Building the Theme](#building-the-theme)
6. [The Golden Rule](#the-golden-rule)
7. [Development Workflow](#development-workflow)
8. [Common Pitfalls](#common-pitfalls)

---

## Core Concept

### The Problem with Traditional Patterns

**What happens with regular patterns:**
```
User inserts pattern → WordPress COPIES blocks to database → Pattern and page disconnected
Developer updates pattern file → OLD pages DON'T update ❌
```

**Result:** You have to manually update every page that used the pattern. NO BUENO! 🚫

---

### The Solution: Template Parts + Pattern References

**The correct approach:**
```
Pattern File (patterns/header.php)
    ↓ (referenced by)
Template Part (parts/header.html) → <!-- wp:pattern {"slug":"theme/header"} /-->
    ↓ (included in)
Template (templates/page.html) → <!-- wp:template-part {"slug":"header"} /-->
    ↓ (used by)
All Pages

Update Pattern File → ALL PAGES UPDATE ✅
```

**Result:** Update styling once, changes reflect everywhere automatically!

---

## Initial Setup

### 1. Create Theme Folder

```
wp-content/themes/your-theme-name/
```

### 2. Create Required Files

**Minimum required:**

#### `style.css` (Theme Header)
```css
/*
Theme Name: Your Theme Name
Theme URI: https://yoursite.com
Author: Your Name
Description: Modern block theme with Tailwind CSS
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
License: GNU General Public License v2 or later
Text Domain: your-theme-slug
*/
```

#### `theme.json` (Configuration)
```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 2,
  "settings": {
    "appearanceTools": true,
    "useRootPaddingAwareAlignments": true,
    "color": {
      "defaultPalette": false,
      "palette": [
        {
          "slug": "base",
          "color": "#ffffff",
          "name": "Base"
        },
        {
          "slug": "contrast",
          "color": "#000000",
          "name": "Contrast"
        },
        {
          "slug": "primary",
          "color": "#0066cc",
          "name": "Primary"
        }
      ]
    },
    "typography": {
      "defaultFontSizes": false,
      "fontFamilies": [
        {
          "slug": "heading",
          "fontFamily": "\"Your Heading Font\", serif",
          "name": "Heading Font"
        },
        {
          "slug": "body",
          "fontFamily": "\"Your Body Font\", sans-serif",
          "name": "Body Font"
        }
      ],
      "fontSizes": [
        {
          "slug": "small",
          "size": "0.875rem",
          "name": "Small"
        },
        {
          "slug": "medium",
          "size": "1rem",
          "name": "Medium"
        },
        {
          "slug": "large",
          "size": "1.5rem",
          "name": "Large"
        },
        {
          "slug": "x-large",
          "size": "2rem",
          "name": "Extra Large"
        }
      ]
    }
  },
  "styles": {
    "color": {
      "background": "var(--wp--preset--color--base)",
      "text": "var(--wp--preset--color--contrast)"
    },
    "typography": {
      "fontFamily": "var(--wp--preset--font-family--body)",
      "fontSize": "var(--wp--preset--font-size--medium)",
      "lineHeight": "1.6"
    },
    "elements": {
      "heading": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "700",
          "lineHeight": "1.3"
        }
      },
      "link": {
        "color": {
          "text": "var(--wp--preset--color--primary)"
        }
      }
    }
  }
}
```

#### `templates/index.html` (Fallback Template)
```html
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","className":"max-w-7xl mx-auto px-4 py-16"} -->
    <!-- wp:post-title {"className":"font-heading text-5xl mb-8"} /-->
    <!-- wp:post-content {"className":"prose prose-lg"} /-->
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
```

---

## File Structure

```
your-theme-name/
├── style.css                    # Theme header (required)
├── theme.json                   # Configuration (required)
├── functions.php                # PHP functions (required)
├── README.md                    # Documentation
├── STRUCTURE.md                 # This file
├── .gitignore                   # Git exclusions
│
├── templates/                   # Page templates (HTML files)
│   ├── index.html              # Fallback (required)
│   ├── page.html               # Default page template
│   ├── front-page.html         # Homepage
│   ├── single.html             # Blog posts
│   ├── page-contact.html       # Specific page template
│   └── ...
│
├── parts/                       # Template parts (HTML files)
│   ├── header.html             # Site header
│   ├── footer.html             # Site footer
│   ├── category-intro.html     # Reusable section
│   └── ...
│
├── patterns/                    # Block patterns (PHP files)
│   ├── header.php              # Header pattern
│   ├── footer.php              # Footer pattern
│   ├── category-intro.php      # Category intro pattern
│   ├── hero-section.php        # Hero pattern
│   └── ...
│
├── src/                         # Source files
│   └── index.css               # Tailwind source
│
├── build/                       # Compiled files
│   └── index.css               # Compiled Tailwind CSS
│
├── assets/                      # Static assets
│   ├── images/
│   ├── fonts/
│   └── js/
│
├── package.json                 # npm dependencies
└── node_modules/                # npm packages (gitignored)
```

---

## Tailwind CSS Setup

### Step 1: Create `package.json`

```json
{
  "name": "your-theme-name",
  "version": "1.0.0",
  "description": "WordPress Block Theme with Tailwind CSS",
  "scripts": {
    "preview": "npm-run-all --parallel sync wpstart tailwindwatch",
    "sync": "browser-sync start -p 'yoursite.local' --files '**/*.php' '**/*.html' 'build/*.js' 'build/*.css'",
    "buildwp": "wp-scripts build",
    "build": "npm-run-all --sequential buildwp tailwindbuild",
    "wpstart": "wp-scripts start",
    "start": "npm-run-all --parallel wpstart tailwindwatch",
    "tailwindbuild": "tailwindcss -i ./src/index.css -o ./build/index.css --minify",
    "tailwindwatch": "tailwindcss -i ./src/index.css -o ./build/index.css --watch --minify"
  },
  "devDependencies": {
    "@tailwindcss/cli": "^4.1.14",
    "@tailwindcss/typography": "^0.5.19",
    "@wordpress/scripts": "^30.26.0",
    "browser-sync": "^3.0.4",
    "npm-run-all": "^4.1.5",
    "tailwindcss": "^4.1.14"
  }
}
```

### Step 2: Create `src/index.css`

```css
@import "tailwindcss";
@plugin "@tailwindcss/typography";

/* Theme Configuration */
@theme {
  /* Brand Colors */
  --color-brand-primary: #0066cc;
  --color-brand-secondary: #333333;
  --color-brand-bg: #f5f5f5;

  /* Semantic Colors */
  --color-primary: var(--color-brand-primary);
  --color-secondary: var(--color-brand-secondary);
  --color-background: var(--color-brand-bg);

  /* Typography */
  --font-heading: "Your Heading Font", serif;
  --font-body: "Your Body Font", sans-serif;
}

/* Custom Utilities */
@utility font-heading {
  font-family: var(--font-heading);
}

@utility font-body {
  font-family: var(--font-body);
}

/* Universal Section Padding */
.section-padding {
  @apply py-12 md:py-16 lg:py-20;
}

.section-padding-lg {
  @apply py-16 md:py-20 lg:py-24;
}

.section-padding-sm {
  @apply py-8 md:py-12;
}
```

### Step 3: Create `functions.php`

```php
<?php
/**
 * Theme Functions
 */

// Enqueue Tailwind CSS for Frontend
function yourtheme_enqueue_styles() {
    wp_enqueue_style(
        'yourtheme-tailwind',
        get_theme_file_uri('build/index.css'),
        array(),
        filemtime(get_theme_file_path('build/index.css'))
    );
}
add_action('wp_enqueue_scripts', 'yourtheme_enqueue_styles');

// Enqueue Tailwind CSS for Block Editor (Site Editor)
function yourtheme_enqueue_editor_styles() {
    wp_enqueue_style(
        'yourtheme-tailwind-editor',
        get_theme_file_uri('build/index.css'),
        array(),
        filemtime(get_theme_file_path('build/index.css'))
    );
}
add_action('enqueue_block_editor_assets', 'yourtheme_enqueue_editor_styles');

// Enqueue Google Fonts (Frontend + Editor)
function yourtheme_enqueue_fonts() {
    wp_enqueue_style(
        'yourtheme-google-fonts',
        'https://fonts.googleapis.com/css2?family=Your+Heading+Font:wght@400;600;700&family=Your+Body+Font:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'yourtheme_enqueue_fonts');
add_action('enqueue_block_editor_assets', 'yourtheme_enqueue_fonts');

// Theme Setup
function yourtheme_theme_setup() {
    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add editor stylesheet
    add_editor_style(array(
        'build/index.css',
        'https://fonts.googleapis.com/css2?family=Your+Heading+Font:wght@400;600;700&family=Your+Body+Font:wght@300;400;500;600;700&display=swap'
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 96,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'yourtheme'),
    ));
}
add_action('after_setup_theme', 'yourtheme_theme_setup');
```

### Step 4: Install and Build

```bash
# Navigate to theme directory
cd wp-content/themes/your-theme-name

# Install dependencies
npm install

# Build Tailwind CSS
npm run build

# Or watch for changes during development
npm run tailwindwatch
```

### Step 5: Create `.gitignore`

```
# Dependencies
node_modules/
package-lock.json

# OS files
.DS_Store
Thumbs.db

# Editor files
.vscode/
.idea/
*.swp

# Environment
.env

# WordPress
*.log
```

---

## Building the Theme

### The Golden Rule

**NEVER put blocks directly in template parts!**

**Wrong ❌:**
```html
<!-- parts/header.html -->
<!-- wp:group -->
    <!-- wp:site-logo /-->
    <!-- wp:navigation /-->
<!-- /wp:group -->
```

**Correct ✅:**
```html
<!-- parts/header.html -->
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

---

### Three-Layer Architecture

```
Layer 1: PATTERNS (patterns/*.php)
    ↓ Contains actual blocks and styling
    ↓
Layer 2: TEMPLATE PARTS (parts/*.html)
    ↓ References patterns
    ↓
Layer 3: TEMPLATES (templates/*.html)
    ↓ Includes template parts
    ↓
Pages use templates
```

---

### Step-by-Step Build Process

#### 1. Create Pattern File

**File:** `patterns/header.php`

```php
<?php
/**
 * Title: Header
 * Slug: yourtheme/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"tagName":"header","className":"sticky top-0 z-50 bg-white shadow-sm"} -->
<header class="wp-block-group sticky top-0 z-50 bg-white shadow-sm">

    <!-- wp:group {"className":"container mx-auto px-[5%]","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <div class="wp-block-group container mx-auto px-[5%]">

        <!-- wp:site-logo {"width":150} /-->

        <!-- wp:group {"className":"flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group flex items-center gap-8">

            <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"right"}} /-->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"rounded-full"} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-white-color has-primary-background-color rounded-full" href="/contact">Get Started</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</header>
<!-- /wp:group -->
```

---

#### 2. Create Template Part (Reference Pattern)

**File:** `parts/header.html`

```html
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

**That's it! Just a reference.**

---

#### 3. Use Template Part in Templates

**File:** `templates/page.html`

```html
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","className":"max-w-7xl mx-auto px-4 py-16"} -->
    <!-- wp:post-content {"className":"prose prose-lg"} /-->
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
```

---

### Common Components

#### Header Pattern

**File:** `patterns/header.php`

See example above.

**File:** `parts/header.html`
```html
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

---

#### Footer Pattern

**File:** `patterns/footer.php`

```php
<?php
/**
 * Title: Footer
 * Slug: yourtheme/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"tagName":"footer","className":"bg-gray-900 text-white py-12"} -->
<footer class="wp-block-group bg-gray-900 text-white py-12">

    <!-- wp:group {"className":"max-w-7xl mx-auto px-4 text-center"} -->
    <div class="wp-block-group max-w-7xl mx-auto px-4 text-center">

        <!-- wp:paragraph -->
        <p>© 2025 Your Company. All rights reserved.</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

</footer>
<!-- /wp:group -->
```

**File:** `parts/footer.html`
```html
<!-- wp:pattern {"slug":"yourtheme/footer"} /-->
```

---

#### Reusable Section (Category Intro)

**File:** `patterns/category-intro.php`

```php
<?php
/**
 * Title: Category Intro
 * Slug: yourtheme/category-intro
 * Categories: featured
 */
?>
<!-- wp:group {"className":"section-padding"} -->
<div class="wp-block-group section-padding">

    <!-- wp:columns {"className":"gap-8 lg:gap-12"} -->
    <div class="wp-block-columns gap-8 lg:gap-12">

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"className":"font-heading text-4xl text-primary mb-6"} -->
            <h2 class="font-heading text-4xl text-primary mb-6">Section Title</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"text-lg"} -->
            <p class="text-lg">Description text goes here.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"className":"w-full h-full object-cover rounded-xl"} -->
            <figure class="wp-block-image w-full h-full object-cover rounded-xl">
                <img alt=""/>
            </figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
```

**File:** `parts/category-intro.html`
```html
<!-- wp:pattern {"slug":"yourtheme/category-intro"} /-->
```

---

## The Golden Rule

### ✅ DO THIS (Updates Everywhere):

```
1. Create pattern: patterns/header.php
2. Create template part: parts/header.html → References pattern
3. Use in template: templates/page.html → Includes template part

Update patterns/header.php → ALL PAGES UPDATE ✅
```

---

### ❌ DON'T DO THIS (Copy-Paste Hell):

```
1. Create pattern: patterns/hero.php
2. User inserts pattern on Page A
3. User inserts pattern on Page B

Update patterns/hero.php → OLD PAGES DON'T UPDATE ❌
You have to manually update Page A and Page B
```

---

### When to Use Each Approach

**Use Template Parts + Pattern References for:**
- Headers (same everywhere)
- Footers (same everywhere)
- Category intros (same everywhere)
- Any section that should be identical across pages

**Use Standalone Patterns for:**
- One-off sections that vary per page
- Content blocks users can customize freely
- Starting point templates (user can modify after insertion)

---

## Development Workflow

### Day-to-Day Development

```bash
# Watch Tailwind CSS for changes
npm run tailwindwatch

# In another terminal: watch with browser-sync (live reload)
npm run preview
```

### Building the Theme

1. **Start with templates**
   - Create `templates/index.html` (fallback)
   - Create `templates/page.html` (default pages)
   - Create `templates/front-page.html` (homepage)

2. **Create patterns for reusable sections**
   - `patterns/header.php`
   - `patterns/footer.php`
   - `patterns/hero.php`
   - `patterns/category-intro.php`

3. **Create template parts that reference patterns**
   - `parts/header.html` → References `patterns/header.php`
   - `parts/footer.html` → References `patterns/footer.php`

4. **Include template parts in templates**
   - `templates/page.html` includes `parts/header.html` and `parts/footer.html`

5. **Style with Tailwind in pattern files**
   - Edit `patterns/header.php` to update header styling
   - All pages using header update automatically!

---

### Updating Styling

**To update a section everywhere:**

1. Open pattern file (e.g., `patterns/header.php`)
2. Edit Tailwind classes or structure
3. Save
4. **All pages using that pattern automatically update!** ✅

**Example:**
```php
// patterns/header.php
// Change button styling
"className":"rounded-full px-8 py-4 text-lg bg-primary"
```

Save → All headers update!

---

## Common Pitfalls

### ❌ Pitfall 1: Putting Blocks Directly in Template Parts

**Wrong:**
```html
<!-- parts/header.html -->
<!-- wp:group -->
    <!-- blocks here -->
<!-- /wp:group -->
```

**Why it's wrong:** Update this → Only updates if never edited in Site Editor

**Correct:**
```html
<!-- parts/header.html -->
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

```php
// patterns/header.php
<?php /* Pattern metadata */ ?>
<!-- blocks here -->
```

---

### ❌ Pitfall 2: Forgetting to Build Tailwind

**Symptom:** No styling shows on site

**Fix:**
```bash
npm run build
```

Or during development:
```bash
npm run tailwindwatch
```

---

### ❌ Pitfall 3: Wrong Pattern Slug

**Wrong:**
```html
<!-- parts/header.html -->
<!-- wp:pattern {"slug":"header"} /-->
```

```php
// patterns/header.php
/**
 * Slug: yourtheme/header
 */
```

**Slugs don't match!** WordPress can't find pattern.

**Fix:** Match slugs exactly:
```html
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

---

### ❌ Pitfall 4: Using Patterns Instead of Template Parts

**Wrong approach:**
User inserts pattern on 10 pages → Update pattern → Old pages don't change

**Correct approach:**
Create template part that references pattern → Use template part → Update pattern → All pages change

---

### ❌ Pitfall 5: Not Using `filemtime()` for Cache Busting

**Wrong:**
```php
wp_enqueue_style('theme-css', get_theme_file_uri('build/index.css'), array(), '1.0.0');
```

**Problem:** Browser caches CSS, updates don't show

**Correct:**
```php
wp_enqueue_style(
    'theme-css',
    get_theme_file_uri('build/index.css'),
    array(),
    filemtime(get_theme_file_path('build/index.css'))
);
```

**Now:** File changes → Timestamp changes → Browser reloads CSS automatically

---

## Quick Reference

### File Types Cheat Sheet

| File Type | Extension | Purpose | Example |
|-----------|-----------|---------|---------|
| **Templates** | `.html` | Full page layouts | `page.html`, `front-page.html` |
| **Template Parts** | `.html` | Reusable components | `header.html`, `footer.html` |
| **Patterns** | `.php` | Actual block code | `header.php`, `hero.php` |
| **Styles** | `.css` | Tailwind source/build | `src/index.css`, `build/index.css` |
| **Config** | `.json` | Theme configuration | `theme.json`, `package.json` |

---

### Block Syntax Quick Reference

**Template Part:**
```html
<!-- wp:template-part {"slug":"header"} /-->
```

**Pattern Reference:**
```html
<!-- wp:pattern {"slug":"yourtheme/header"} /-->
```

**Group Block:**
```html
<!-- wp:group {"className":"your-classes"} -->
    <!-- nested blocks -->
<!-- /wp:group -->
```

**Self-Closing Block:**
```html
<!-- wp:site-logo {"width":150} /-->
```

**Block with Content:**
```html
<!-- wp:heading {"className":"text-4xl"} -->
<h2>Your Heading</h2>
<!-- /wp:heading -->
```

---

### Template Hierarchy

WordPress looks for templates in this order:

**For Pages:**
1. `page-{slug}.html` (specific page)
2. `page-{id}.html` (specific page by ID)
3. `page.html` (default page template)
4. `singular.html` (any single content)
5. `index.html` (fallback)

**For Homepage:**
1. `front-page.html`
2. `home.html`
3. `index.html`

**For Blog Posts:**
1. `single-post.html`
2. `single.html`
3. `singular.html`
4. `index.html`

---

### npm Scripts Reference

```bash
npm run build           # Build everything for production
npm run tailwindbuild   # Build Tailwind CSS only
npm run tailwindwatch   # Watch Tailwind CSS changes
npm run start           # Watch Tailwind + WordPress scripts
npm run preview         # Watch + browser-sync (live reload)
```

---

## Checklist for New Theme

- [ ] Create `style.css` with theme header
- [ ] Create `theme.json` with colors, fonts, settings
- [ ] Create `functions.php` with CSS/font enqueuing
- [ ] Create `package.json` with Tailwind dependencies
- [ ] Create `src/index.css` with Tailwind imports
- [ ] Run `npm install`
- [ ] Run `npm run build`
- [ ] Create `templates/index.html` (minimum required)
- [ ] Create pattern files in `patterns/`
- [ ] Create template parts in `parts/` that reference patterns
- [ ] Create templates in `templates/` that include template parts
- [ ] Test: Update pattern → Verify all pages update
- [ ] Create `.gitignore`
- [ ] Activate theme in WordPress

---

## Summary

**The Key Principle:**

```
Patterns (PHP) ← Edit these to update styling
    ↓ (referenced by)
Template Parts (HTML) ← Just references
    ↓ (included in)
Templates (HTML) ← Page structures
    ↓ (used by)
Pages ← Automatically update when patterns change! ✅
```

**Update once, changes everywhere. This is the way.**

---

**Last Updated:** 2025-11-21
**Author:** Loc Nguyen
**License:** MIT
