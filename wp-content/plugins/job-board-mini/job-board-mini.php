<?php
/**
 * Plugin Name: Job Board Mini
 * Description: Lightweight plugin to manage and display job listings.
 * Version: 1.0
 * Author: Wilmer Campos
 */

if (!defined('ABSPATH')) exit;

define('JOB_BOARD_MINI_PATH', plugin_dir_path(__FILE__));

require_once JOB_BOARD_MINI_PATH . 'includes/custom-post-type.php';



function job_board_mini_enqueue_scripts() {
    wp_enqueue_script(
        'job-board-mini-js', 
        plugin_dir_url( __FILE__ ) . 'js/job-board-mini.js', 
        array(), 
        null, 
        true 
    );
}

add_action('wp_enqueue_scripts', 'job_board_mini_enqueue_scripts');

function add_tailwind_to_plugin() {
    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'add_tailwind_to_plugin');
add_action('admin_enqueue_scripts', 'add_tailwind_to_plugin');



//add this page that shows the shortcode to include  in the pages
add_action('admin_menu', 'job_board_add_admin_submenu');

function job_board_add_admin_submenu() {
    add_submenu_page(
        'edit.php?post_type=job',        
        'Job Listings View',            
        'Job Shortcode View',             
        'manage_options',                
        'job-shortcode-view',             
        'job_board_shortcode_admin_page'  
    );
}

function job_board_shortcode_admin_page() {
    echo '<div class="wrap">';
    echo '<div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">';
    echo '<h1 class="text-3xl font-bold text-center text-blue-600 mb-4">All Jobs (Shortcode Output)</h1>';
    echo '<p class="text-gray-700 text-lg mb-6">Utiliza el siguiente shortcode para mostrar los trabajos en cualquier página. Simplemente copia y pega el código donde desees mostrar los trabajos disponibles.</p>';
    echo '<div class="bg-gray-100 p-4 rounded-md border border-gray-300">';
    echo '<p class="font-semibold text-gray-800 mb-2">Shortcode:</p>';
    echo '<pre class="bg-white p-2 rounded border border-gray-200 text-purple-600 font-mono">[job_listings]</pre>';
    echo '<p class="text-sm text-gray-500 mt-2">Este shortcode mostrará todos los trabajos en la página donde se coloque.</p>';
    echo '</div>';
    echo '<div class="text-center mt-6">';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}


//list the posts
add_shortcode('job_listings', 'job_board_shortcode_handler');

function job_board_shortcode_handler() {
    $args = [
        'post_type' => 'job',
        'posts_per_page' => -1,
    ];

    $query = new WP_Query($args);
    $output = '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">'; 

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow transition-transform duration-300 transform hover:scale-105">'; // Efecto de hover
            $output .= '<div class="p-6">';
            $output .= '<h2 class="text-2xl font-bold text-blue-600 mb-4 hover:text-blue-800 transition-colors duration-300">' . get_the_title() . '</h2>'; // Título con cambio de color en hover
            $output .= '<div class="text-gray-700 mb-4">' . get_the_excerpt() . '</div>';
            
            $output .= '<div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-4">';
            $output .= '<p><strong>Location:</strong> ' . get_post_meta(get_the_ID(), 'location', true) . '</p>';
            $output .= '<p><strong>Salary:</strong> ' . get_post_meta(get_the_ID(), 'salary', true) . '</p>';
            $output .= '<p><strong>Type:</strong> ' . get_post_meta(get_the_ID(), 'job_type', true) . '</p>'; // Aquí se muestra el tipo de trabajo
            $output .= '</div>';
            
            $output .= '<a href="' . get_permalink() . '" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-full text-center hover:bg-blue-700 transition-colors duration-300">Ver Más</a>';
            $output .= '</div>';
            $output .= '</div>';
            
        }
        wp_reset_postdata();
    } else {
        $output .= '
        <div class="text-black! col-span-full text-center p-6 bg-gradient-to-r from-pink-500 to-red-600 text-white rounded-xl shadow-lg animate-pulse">
          <p class="text-xl font-semibold">🚫 No job listings found at the moment.</p>
          <p class="text-sm mt-2">Please check back later or try a different search.</p>
        </div>';
        
    }

    $output .= '</div>';
    return $output;
}


// insert a submenu page to create samples

function insert_sample_jobs() {
    $jobs = [
        [
            'title'       => 'Software Engineer',
            'content'     => 'Join our team and work on cutting-edge technology.',
            'location'    => 'New York, NY',
            'salary'      => 80000,
            'job_type'    => 'Full-time',
        ],
        [
            'title'       => 'Product Manager',
            'content'     => 'Lead product development and strategy.',
            'location'    => 'San Francisco, CA',
            'salary'      => 120000,
            'job_type'    => 'Full-time',
        ],
        [
            'title'       => 'Graphic Designer',
            'content'     => 'Design beautiful interfaces for our platform.',
            'location'    => 'Los Angeles, CA',
            'salary'      => 60000,
            'job_type'    => 'Part-time',
        ],
        [
            'title'       => 'UX/UI Developer',
            'content'     => 'Create engaging user experiences for our web and mobile apps.',
            'location'    => 'Chicago, IL',
            'salary'      => 95000,
            'job_type'    => 'Contract',
        ],
        [
            'title'       => 'Data Scientist',
            'content'     => 'Analyze data to drive business decisions and innovation.',
            'location'    => 'Remote',
            'salary'      => 110000,
            'job_type'    => 'Full-time',
        ],
    ];

    foreach ($jobs as $job) {
        $post_id = wp_insert_post([
            'post_title'   => $job['title'],
            'post_content' => $job['content'],
            'post_status'  => 'publish',
            'post_type'    => 'job', 
            'meta_input'   => [
                'location'  => $job['location'],
                'salary'    => $job['salary'],
                'job_type'  => $job['job_type'], 
            ],
        ]);
    }

    update_option('sample_jobs_inserted', 'yes');
}



function add_sample_jobs_submenu() {
    add_submenu_page(
        'edit.php?post_type=job', 
        'Sample Job Insert',
        'Insert Sample Jobs',     
        'manage_options',        
        'sample-job-insert',      
        'sample_jobs_page_content' 
    );
}
add_action('admin_menu', 'add_sample_jobs_submenu');

function sample_jobs_page_content() {
    ?>
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8 mt-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-4 text-center">🚀 Insert Sample Jobs</h1>
    <p class="text-gray-600 text-center mb-6">Click the button below to insert sample job listings into the database.</p>
    
    <form method="post" class="flex justify-center">
        <button type="submit" name="insert_sample_jobs" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
            ➕ Insert Sample Jobs
        </button>
    </form>
    
    <?php if (isset($_POST['insert_sample_jobs'])): ?>
        <div class="mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center shadow-sm">
            ✅ Sample jobs have been inserted successfully!
        </div>
    <?php endif; ?>
</div>

    <?php

    if (isset($_POST['insert_sample_jobs'])) {
        insert_sample_jobs(); 
        echo '<div class="updated"><p>Sample jobs have been inserted.</p></div>';
    }
}
