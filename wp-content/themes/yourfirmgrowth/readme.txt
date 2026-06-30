=== YourFirmGrowth ===

Contributors: yourfirmgrowth
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Version: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A modern, fast, SEO-friendly business theme for firms, agencies and growth-focused companies.

== Features ==
* Custom homepage (front-page.php) with hero, services, latest posts and CTA sections
* Customizer controls for hero & CTA text/links (Appearance > Customize > YourFirmGrowth — Homepage)
* Primary + footer navigation menus
* Custom logo support
* Blog sidebar + 3 footer widget columns
* Responsive, mobile menu, smooth scroll
* Translation-ready (text domain: yourfirmgrowth)

== Setup ==
1. Activate the theme: Appearance > Themes > YourFirmGrowth > Activate.
2. Create menus: Appearance > Menus — assign to "Primary Menu" and "Footer Menu".
3. (Optional) Set a static homepage: Settings > Reading > "A static page".
   The custom homepage layout in front-page.php loads automatically on the front page.
4. Customize hero/CTA text: Appearance > Customize > "YourFirmGrowth — Homepage".
5. Add widgets: Appearance > Widgets (Blog Sidebar + Footer Columns 1-3).

== File Structure ==
yourfirmgrowth/
├── style.css              (theme header)
├── functions.php          (setup, assets, menus, widgets)
├── index.php              (blog listing)
├── front-page.php         (custom homepage)
├── header.php / footer.php
├── page.php / single.php / archive.php / search.php / 404.php
├── sidebar.php / comments.php
├── inc/
│   ├── template-tags.php  (meta & taxonomy helpers)
│   └── customizer.php     (hero/CTA controls)
├── template-parts/
│   ├── content.php
│   ├── content-card.php
│   └── content-none.php
└── assets/
    ├── css/main.css
    ├── js/main.js
    └── images/
