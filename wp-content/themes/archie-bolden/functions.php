<?php

function theme_scripts() {
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);

    wp_enqueue_style('archie-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    wp_enqueue_script('archie-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

add_theme_support('post-thumbnails');


add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/jobs', [
      'methods' => 'GET',
      'callback' => 'get_filtered_jobs',
      'permission_callback' => '__return_true'
    ]);
  });
  
  function get_filtered_jobs($request) {
    $location = sanitize_text_field($request->get_param('location'));
    $min_salary = intval($request->get_param('min_salary'));
    $max_salary = intval($request->get_param('max_salary'));
  
    $args = [
      'post_type' => 'job',
      'posts_per_page' => -1,
      'meta_query' => [],
    ];
  
    if ($location) {
      $args['meta_query'][] = [
        'key' => 'location',
        'value' => $location,
        'compare' => 'LIKE'
      ];
    }
  
    if ($min_salary || $max_salary) {
      $salary_query = ['key' => 'salary', 'type' => 'NUMERIC'];
  
      if ($min_salary && $max_salary) {
        $salary_query['value'] = [$min_salary, $max_salary];
        $salary_query['compare'] = 'BETWEEN';
      } elseif ($min_salary) {
        $salary_query['value'] = $min_salary;
        $salary_query['compare'] = '>=';
      } elseif ($max_salary) {
        $salary_query['value'] = $max_salary;
        $salary_query['compare'] = '<=';
      }
  
      $args['meta_query'][] = $salary_query;
    }
  
    $query = new WP_Query($args);
    $results = [];
  
    while ($query->have_posts()) {
      $query->the_post();
      $results[] = [
        'title' => get_the_title(),
        'location' => get_post_meta(get_the_ID(), 'location', true),
        'salary' => get_post_meta(get_the_ID(), 'salary', true),
        'description' => get_the_excerpt()
      ];
    }
  
    wp_reset_postdata();
    return $results;
  }
  