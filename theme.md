# Theme Developer Documentation

This document outlines the technical structure and development logic of the **Baizonn Custom Theme**. The theme was built from scratch using the `_s` (Underscores) starter theme as a base.

## 1. Theme Overview

* **Theme Name:** `baizonn-theme`
* **Text Domain:** `baizonn-theme`
* **Base Framework:** Underscores (`_s`)
* **CSS Framework:** None (Custom CSS only)

## 2. Directory Structure

We have organized the theme folder as follows:

* `/assets/` - Stores all static images (Logo, Maps, Awards, Background banners).
* `/inc/` - Standard Underscores includes (customizer, template tags).
* `/template-parts/` - Partial template files for standard content loops.
* `page-teachers.php` - **[Custom]** Special template for the "Our Team" page.
* `style.css` - **[Custom]** Main stylesheet.

## 3. Key Customizations

### A. Custom Page Template (`page-teachers.php`)

We created a specific template to handle the staff directory dynamically. This prevents the need to manually edit HTML whenever a teacher joins or leaves.

* **Logic:** The template executes a custom `WP_Query` loop.
* **Target:** It fetches posts specifically from the category slug **`teachers`**.
* **Output:** It renders the Featured Image (Avatar), Title (Teacher Name), and Content (Bio) in a responsive grid layout.

**Code Snippet:**

```php
$args = array(
    'category_name' => 'teachers', // Slugs must match this
    'posts_per_page' => -1,        // Show all teachers
    'orderby'       => 'date',
    'order'         => 'ASC'
);
$teacher_query = new WP_Query( $args );
```

### B. Styles & Layout (`style.css`)

The design uses a specific color palette defined in CSS variables (`:root`) to match the client's branding:

* **Primary Blue:** `#003366` (Headers, Footer background)
* **Primary Green:** `#4CAF50` (Highlights, Buttons, Active links)
* **Background:** `#ffffff` (Clean white background)

**Key CSS Features:**

* **Sticky Header:** The navigation bar uses `position: sticky` with a box-shadow for depth.
* **Flexbox Navigation:** The menu is styled using Flexbox to align the logo left and menu items right.
* **Responsive Tables:** The schedule tables use `overflow-x: auto` to prevent breaking layouts on mobile devices.

### C. Header & Footer (`header.php` / `footer.php`)

* **Header:** The default text-based site title was replaced with the client's logo image located at `/assets/logo.jpg`.
* **Footer:** The copyright year is dynamic using PHP `date('Y')`. Hardcoded "Powered by WordPress" text was removed and replaced with the client's contact info.

## 4. Development Notes for Future Maintainers

> **Important:**
>
> * **Images:** Always upload theme assets (logos, icons) to the `/assets/` folder, not the Media Library, if they are part of the design structure.
> * **Menu:** The mobile menu button has been hidden via CSS (`button.menu-toggle { display: none; }`) as per current design requirements.
> * **Permalinks:** If the "Our Team" page returns a 404 error, go to **Settings > Permalinks** and click "Save Changes" to flush the rewrite rules.