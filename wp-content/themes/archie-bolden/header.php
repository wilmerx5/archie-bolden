<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> class="bg-white text-gray-900">

  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-blue-600">
        <?php bloginfo('name'); ?>
      </a>

      <nav class="space-x-4 hidden md:block">
        <a href="<?php echo home_url(); ?>" class="hover:text-blue-600">Inicio</a>
        <a href="<?php echo home_url('/jobs'); ?>" class="hover:text-blue-600">Trabajos</a>
        <a href="#contact" class="hover:text-blue-600">Contacto</a>
      </nav>
    </div>
  </header>
