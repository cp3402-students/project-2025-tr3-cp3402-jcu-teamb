# Deployment and Development Workflow

This document outlines the workflow used by the team to develop, test, and deploy the Baizonn Learning Centre website.

## 1. Development Environment

We utilized a local-first development approach to ensure code safety and speed.

*   **Local Server:** [USBWebserver](https://usbwebserver.yura.mk.ua/) (Apache, MySQL, PHP) running on Windows.
*   **Code Editor:** Visual Studio Code.
*   **Version Control:** Git & GitHub.
*   **Browser Testing:** Chrome DevTools (for responsive testing).

## 2. Version Control Workflow

We used a standard Git workflow to manage the custom theme code.

1.  **Repository:** Only the custom theme folder (`wp-content/themes/baizonn-theme`) is tracked in Git. WordPress core files and uploads are excluded to keep the repo clean.
2.  **Commits:** Changes to PHP, CSS, and asset files were committed regularly with descriptive messages (e.g., "Added teachers page template", "Fixed header CSS").
3.  **Push:** Code was pushed to the central GitHub repository for team collaboration.

## 3. Deployment Strategy (Migration)

Since we do not have SSH access for a CI/CD pipeline on the student hosting tier, we adopted a **Migration-based Deployment Strategy** using the **All-in-One WP Migration** plugin. This ensures database consistency between Local and Live environments.

### Step-by-Step Deployment Guide

**Step 1: Local Preparation**
1.  Ensure all code changes are committed to Git.
2.  Verify all content (pages, posts, images) is correct on the local USBWebserver site.
3.  Go to **Dashboard > All-in-One WP Migration > Export**.
4.  Select **Export To > File**.
5.  Download the generated `.wpress` file.

**Step 2: Live Server Deployment**
1.  Log in to the live SiteGround WordPress Dashboard.
2.  Ensure the **All-in-One WP Migration** plugin is active.
3.  Go to **All-in-One WP Migration > Import**.
4.  Drag and drop the local `.wpress` file into the import area.
5.  **Warning:** The plugin will warn that the database will be overwritten. Click **Proceed**.
6.  Once finished, click **Finish**.

**Step 3: Post-Deployment Configuration**
1.  **Re-login:** The live site's credentials will now match the local site's credentials.
2.  **Permalinks:** Go to **Settings > Permalinks** and click **Save Changes** immediately. This flushes the rewrite rules and prevents 404 errors on inner pages.
3.  **Verification:** Manually check the "Our Team" page and "Contact" forms to ensure functionality.