# TheBubble.org.uk

[![WordPress](https://img.shields.io/badge/CMS-WordPress-21759B?style=flat-square&logo=wordpress&logoColor=white)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Hosted on DigitalOcean](https://img.shields.io/badge/Host-DigitalOcean_Droplet-0080FF?style=flat-square&logo=digitalocean&logoColor=white)](https://www.digitalocean.com/)

WordPress Theme for [The Bubble (https://thebubble.org.uk/)](https://thebubble.org.uk/), Durham University's online student magazine publishing content across Current Affairs, Culture, and Lifestyle.

This repository deploys directly to the theme on the live website, with all media and database content hosted on a DigitalOcean Droplet Server.

The original website was set up & designed by [Jack Usher](https://www.linkedin.com/in/jack-usher-00884313b/). Later, the website was maintained and the theme adapted by [Oscar Ryley](https://github.com/Oscar-Ryley).

---

## 🟩 Test this theme with Local

For development, use [Local](https://localwp.com/) to run a fully functional copy of the WordPress site with this repo's theme active.

### Get a zipped copy of the site

Log into the live site as an Administrator and use the **wp-backup** plugin to generate and download a zip archive of the website. Ensure the backup includes both the WordPress files and the database.

A full backup file is very large (currently around 40GB). To save disk space and make local development faster, you can shrink the site size. Either configure wp-backup to exclude heavy media folders (like older years in `wp-content/uploads`) before generating the zip, or manually delete those folders from your local directory after extracting. 

### Import the site into Local

1. Install and open [Local](https://localwp.com/).
2. Drag and drop the downloaded `wp-backup` zip file directly into the Local application window (or click **Create a new site** > **Import an existing site**).
3. Follow the prompts and name the site `thebubble`. Assign it a domain like `thebubble.local`.
4. Start the site and click **WP Admin** to confirm WordPress loads successfully.

**If the import fails:** Create a blank site in Local named `thebubble`. Extract your backup zip manually, copy the WordPress files into the new site's `app/public` directory, and import the database via Local's **Open Adminer** database tool. Update `wp-config.php` to use Local's database credentials, and if it redirects to the live site, update the `siteurl` and `home` values in the `wp_options` database table to `http://thebubble.local`.

### Connect this theme repository

Find your theme folder:

```text
Local Sites/thebubble/app/public/wp-content/themes/TheBubble.org.uk
```

Point your IDE to this directory, or clone/initialise this Git repository directly inside it. Then log into your local WordPress admin, go to **Appearance > Themes**, and activate **TheBubble**.

### Test your changes

1. Start the site in Local and open `thebubble.local` in your browser.
2. Make your theme changes in your IDE and refresh the browser.
3. Test both desktop and mobile views.
4. Verify the following features are working: homepage, archive pages, individual articles, search results, comments, navigation, and footer.
5. Ensure no new PHP warnings, broken images, or browser console errors appear.

### Deploying

Push your commits to the `main` branch to trigger deployment. This will automatically update the live theme files via a GitHub Actions workflow. Media uploads and database content will remain untouched on the server. Ensure you never commit database exports, media uploads, or `wp-config.php` to this repository.
