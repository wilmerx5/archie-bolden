<?php get_header(); ?>

<!-- HERO SECTION -->
<section class="bg-teal-500 h-[60vh] flex items-center justify-center text-white">
  <div class="text-center px-4">
    <h1 class="text-4xl md:text-6xl font-bold">Find Your Next Job</h1>
    <p class="mt-4 text-lg">Discover job opportunities near you</p>
  </div>
</section>

<!-- JOB FILTERS + RESULTS -->
<section class="py-12 px-4 max-w-6xl mx-auto">
  <h2 class="text-2xl font-semibold text-center mb-6">Filter Jobs</h2>

  <!-- Filters -->
  <div class="grid md:grid-cols-3 gap-4 mb-8">
    <input type="text" id="locationFilter" placeholder="Location" class="border px-4 py-2 rounded w-full" />
    <input type="number" id="minSalary" placeholder="Min Salary" class="border px-4 py-2 rounded w-full" />
    <input type="number" id="maxSalary" placeholder="Max Salary" class="border px-4 py-2 rounded w-full" />
  </div>

  <div id="jobResults" class="space-y-4 hidden"></div>

  <div id="defaultJobListings" class="space-y-4">
    <?php echo do_shortcode('[job_listings]'); ?>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="py-12 bg-gray-100 px-4">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-start">
    
    <div>
      <h2 class="text-2xl font-semibold mb-6 text-center md:text-left">Contact Us</h2>
      <form class="space-y-4" method="post" action="#">
        <div>
          <label for="name" class="block mb-1 font-medium">Name</label>
          <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded" required />
        </div>
        <div>
          <label for="email" class="block mb-1 font-medium">Email</label>
          <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" required />
        </div>
        <div>
          <label for="message" class="block mb-1 font-medium">Message</label>
          <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">Send</button>
      </form>
    </div>

    <!-- INFO CARDS -->
    <div class="space-y-6">
      <div class="bg-white border-l-4 border-blue-600 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">🤝 We’re glad you're here</h3>
        <p class="text-gray-600">Thank you for visiting our platform. We hope the test has been a great experience for you.</p>
      </div>
      <div class="bg-white border-l-4 border-green-500 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">🚀 Built with love</h3>
        <p class="text-gray-600">This job board was crafted with care, design, and attention to detail. Let us know your thoughts!</p>
      </div>
      <div class="bg-white border-l-4 border-purple-500 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">💡 Open to feedback</h3>
        <p class="text-gray-600">Your opinion matters. Don’t hesitate to send suggestions, questions, or feedback using this form.</p>
      </div>
    </div>

  </div>
</section>



<?php get_footer(); ?>
