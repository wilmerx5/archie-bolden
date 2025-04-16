<?php

function job_board_mini_register_post_type() {
    $args = [
        'labels' => [
            'name' => 'Jobs',
            'singular_name' => 'Job',
            'menu_name' => 'Job Board',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Job',
            'edit_item' => 'Edit Job',
            'new_item' => 'New Job',
            'view_item' => 'View Job',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'jobs'],
    ];
    register_post_type('job', $args);
}
add_action('init', 'job_board_mini_register_post_type');

// Add custom fields to the type
function job_board_mini_add_meta_boxes() {
    add_meta_box(
        'job_details',
        'Job Details',
        'job_board_mini_render_meta_box',
        'job',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'job_board_mini_add_meta_boxes');

function job_board_mini_render_meta_box($post) {
    $location = get_post_meta($post->ID, 'location', true);
    $salary = get_post_meta($post->ID, 'salary', true);
    ?>

    <div class="space-y-6 block">
        <div>
            <label for="job_location" class="block text-sm font-medium text-gray-700 mb-1">📍 Location</label>
            <input
                type="text"
                name="job_location"
                id="job_location"
                value="<?php echo esc_attr($location); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div>
            <label for="job_salary" class="block text-sm font-medium text-gray-700 mb-1">💰 Salary</label>
            <input
                type="text"
                name="job_salary"
                id="job_salary"
                value="<?php echo esc_attr($salary); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>
    </div>

    <?php
}


function job_board_mini_save_meta_boxes($post_id) {
    if (array_key_exists('job_location', $_POST)) {
        update_post_meta($post_id, 'location', sanitize_text_field($_POST['job_location']));
    }
    if (array_key_exists('job_salary', $_POST)) {
        update_post_meta($post_id, 'salary', sanitize_text_field($_POST['job_salary']));
    }
}
add_action('save_post', 'job_board_mini_save_meta_boxes');