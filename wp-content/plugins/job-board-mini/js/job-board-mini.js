// job-board-mini.js
async function fetchJobs() {
    const location = document.getElementById("locationFilter").value.trim();
    const minSalary = document.getElementById("minSalary").value.trim();
    const maxSalary = document.getElementById("maxSalary").value.trim();
  
    const hasFilters = location || minSalary || maxSalary;
  
    // show default shortcode
    if (!hasFilters) {
      document.getElementById("jobResults").classList.add("hidden");
      document.getElementById("defaultJobListings").classList.remove("hidden");
      return;
    }
  
    // show filtered results
    document.getElementById("defaultJobListings").classList.add("hidden");
    const container = document.getElementById("jobResults");
    container.classList.remove("hidden");
    container.innerHTML = '<p class="text-gray-500">Loading...</p>';
  
    try {
      const res = await fetch(`http://localhost/test-archie-bolden/wp-json/custom-api/v1/jobs?location=${location}&min_salary=${minSalary}&max_salary=${maxSalary}`);
      const jobs = await res.json();
  
      container.innerHTML = '';
  
      if (jobs.length === 0) {
        container.innerHTML = `<p class="text-center text-gray-500 bg-yellow-100 p-4 rounded">No jobs found matching your criteria.</p>`;
        return;
      }
  
      jobs.forEach(job => {
        const jobCard = document.createElement("div");
        jobCard.className = "bg-white p-4 shadow rounded border";
        jobCard.innerHTML = `
          <h3 class="text-xl font-bold">${job.title}</h3>
          <p class="text-gray-600">${job.location} | $${job.salary}</p>
          <p class="mt-2">${job.description}</p>
        `;
        container.appendChild(jobCard);
      });
  
    } catch (err) {
      container.innerHTML = `<p class="text-red-600">Error loading jobs. Please try again.</p>`;
    }
  }
  
  document.querySelectorAll('#locationFilter, #minSalary, #maxSalary').forEach(input => {
    input.addEventListener('input', fetchJobs);
  });
  
  fetchJobs();
  