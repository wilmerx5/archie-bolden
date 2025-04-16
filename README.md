# Job Board Mini


## Demostration
 
 https://www.youtube.com/watch?v=fGwXqfjV5Qc&ab_channel=lewildev

**Job Board Mini** is a lightweight WordPress plugin created to manage and display job listings through a custom post type and easy-to-use shortcodes. This plugin provides a clean layout using Tailwind CSS and includes sample data to help get started quickly.

---

##  Features

- Custom Post Type: `job`
- Frontend display using shortcode `[job_listings]`
- Admin shortcode view page
- Option to insert sample job listings
- Styled with TailwindCSS via CDN

---

##  Installation & Setup

1. **Download or Clone this Repository:**
   git clone https://github.com/your-username/job-board-mini.git
2. **Active The theme and the plugin**
3. **Go to the submenu page insert sample jobs and inserted it**
4 **Go to home page and test the app**


## Technical Decisions
Custom Post Type (CPT): A CPT named job was created to keep job listings separate from posts or pages. This allows better content organization and management within WordPress.

Shortcode System: Implemented a clean shortcode [job_listings] that renders job entries using WP_Query, making it extensible and theme-agnostic.

Modular Code Structure: The plugin is split into includes/ files for CPT registration, admin tools, and front-end rendering, making it easier to scale or maintain.

Sample Job Generator: A utility inside the admin panel helps admins quickly insert placeholder jobs for testing or demos.

Native WordPress Functions: No third-party dependencies were used. The plugin leverages core WordPress APIs for reliability and future compatibility.

Simple Styling Approach: Tailwind  CSS is used for layout and readability. All visual adjustments are minimal so it blends with most themes, but can be customized.

## Assumptions Made

Assumptions Made
The site admin is familiar with WordPress basics, such as how to install and activate plugins or use shortcodes.

The plugin will run in environments with themes that support shortcode rendering.

Inserted job listings will be managed via the WordPress Dashboard under Jobs.

Sample data is intended only for testing and should be deleted or modified for production use.

It is assumed that the site does not require complex features like job applications, categories, or filters—this is a minimal plugin by design.


## IA
IA was used  to create som style in tailwind and documentation

## Documentation
The documentation of this plugin was written with the help of ChatGPT to ensure clarity, consistency, and a smooth setup experience for developers and users alike. This AI-assisted approach was used to structure and organize the README to save time and enhance the overall user experience.

