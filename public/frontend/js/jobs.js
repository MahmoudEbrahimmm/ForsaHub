// Job Data
const jobsData = [
  {
    id: 1,
    title: "Senior Frontend Developer",
    company: "Google",
    location: "cairo",
    type: "full-time",
    salary: 30000,
    salaryRange: "25,000 - 35,000",
    experience: "senior",
    category: "programming",
    posted: "2 hours ago",
    applicants: "50+",
    description:
      "We are looking for an experienced Frontend Developer with React and Next.js expertise to join our Cairo team. You will work on our core products with a global team.",
    skills: ["React", "Next.js", "TypeScript", "Tailwind", "GraphQL"],
    featured: true,
    remote: false,
    logo: "G",
    logoColor: "4285F4",
  },
  {
    id: 2,
    title: "Cloud Solutions Architect",
    company: "Microsoft",
    location: "remote",
    type: "full-time",
    salary: 47500,
    salaryRange: "40,000 - 55,000",
    experience: "senior",
    category: "programming",
    posted: "5 hours ago",
    applicants: "120+",
    description:
      "Join Microsoft's Azure team as a Cloud Solutions Architect. Experience in Kubernetes, Terraform, and Azure DevOps is required.",
    skills: ["Azure", "Kubernetes", "Terraform", "Docker", "CI/CD"],
    featured: false,
    remote: true,
    logo: "M",
    logoColor: "00A4EF",
  },
  {
    id: 3,
    title: "Machine Learning Engineer",
    company: "Amazon",
    location: "alexandria",
    type: "full-time",
    salary: 37500,
    salaryRange: "30,000 - 45,000",
    experience: "mid",
    category: "programming",
    posted: "1 day ago",
    applicants: "30+",
    description:
      "AWS team is looking for a Machine Learning Engineer to work on AI and big data projects.",
    skills: ["Python", "TensorFlow", "PyTorch", "AWS", "MLOps"],
    featured: false,
    remote: false,
    urgent: true,
    logo: "A",
    logoColor: "FF9900",
  },
  {
    id: 4,
    title: "DevOps Engineer",
    company: "Netflix",
    location: "giza",
    type: "full-time",
    salary: 33000,
    salaryRange: "28,000 - 38,000",
    experience: "mid",
    category: "programming",
    posted: "3 days ago",
    applicants: "45+",
    description:
      "Join Netflix's infrastructure team. Work on optimizing CI/CD pipelines and cloud management.",
    skills: ["Jenkins", "GitLab CI", "AWS", "Docker", "Linux"],
    featured: false,
    remote: false,
    logo: "N",
    logoColor: "000000",
  },
  {
    id: 5,
    title: "Backend Developer (Go)",
    company: "Twitter",
    location: "remote",
    type: "contract",
    salary: 42500,
    salaryRange: "35,000 - 50,000",
    experience: "senior",
    category: "programming",
    posted: "1 week ago",
    applicants: "200+",
    description:
      "Twitter Core team is looking for a Backend Developer expert in Go to work on distributed systems and scaling.",
    skills: ["Go", "gRPC", "Microservices", "Redis", "Kafka"],
    featured: true,
    remote: true,
    logo: "T",
    logoColor: "1DA1F2",
  },
  {
    id: 6,
    title: "Security Engineer",
    company: "Stripe",
    location: "cairo",
    type: "full-time",
    salary: 37000,
    salaryRange: "32,000 - 42,000",
    experience: "mid",
    category: "programming",
    posted: "3 days ago",
    applicants: "15+",
    description:
      "Protect global payment systems. Experience in penetration testing, cryptography, and security compliance required.",
    skills: ["Penetration Testing", "Cryptography", "OWASP", "SIEM"],
    featured: false,
    remote: false,
    logo: "S",
    logoColor: "635BFF",
  },
  {
    id: 7,
    title: "Product Designer",
    company: "Dribbble",
    location: "remote",
    type: "part-time",
    salary: 25000,
    salaryRange: "20,000 - 30,000",
    experience: "mid",
    category: "design",
    posted: "4 days ago",
    applicants: "60+",
    description:
      "Design exceptional user experiences for a global creative platform. Experience in Figma and Prototyping required.",
    skills: ["Figma", "Prototyping", "User Research", "Design Systems"],
    featured: false,
    remote: true,
    logo: "D",
    logoColor: "EA4C89",
  },
  {
    id: 8,
    title: "Data Engineer",
    company: "Spotify",
    location: "cairo",
    type: "full-time",
    salary: 34000,
    salaryRange: "28,000 - 40,000",
    experience: "mid",
    category: "programming",
    posted: "5 days ago",
    applicants: "25+",
    description:
      "Build massive data systems for the music of the future. Experience in Spark, Kafka, and data pipelines.",
    skills: ["Apache Spark", "Kafka", "Airflow", "Python", "SQL"],
    featured: false,
    remote: false,
    urgent: true,
    logo: "ST",
    logoColor: "0A2540",
  },
  {
    id: 9,
    title: "Mobile Developer (Flutter)",
    company: "Discord",
    location: "remote",
    type: "full-time",
    salary: 27000,
    salaryRange: "22,000 - 32,000",
    experience: "mid",
    category: "programming",
    posted: "1 week ago",
    applicants: "80+",
    description:
      "Develop Discord mobile apps. Experience in Flutter, Dart, and Firebase required.",
    skills: ["Flutter", "Dart", "Firebase", "REST APIs"],
    featured: false,
    remote: true,
    logo: "D",
    logoColor: "5865F2",
  },
  {
    id: 10,
    title: "Site Reliability Engineer",
    company: "Reddit",
    location: "alexandria",
    type: "full-time",
    salary: 36000,
    salaryRange: "30,000 - 42,000",
    experience: "senior",
    category: "programming",
    posted: "2 weeks ago",
    applicants: "40+",
    description:
      "Ensure global reliability of the Reddit platform. Experience in Monitoring and Incident Response.",
    skills: ["Prometheus", "Grafana", "Kubernetes", "Python", "Go"],
    featured: false,
    remote: false,
    logo: "R",
    logoColor: "FF4500",
  },
  {
    id: 11,
    title: "Marketing Manager",
    company: "Meta",
    location: "cairo",
    type: "full-time",
    salary: 45000,
    salaryRange: "40,000 - 50,000",
    experience: "senior",
    category: "marketing",
    posted: "1 day ago",
    applicants: "35+",
    description:
      "Lead marketing campaigns for Meta products in the MENA region.",
    skills: ["Digital Marketing", "SEO", "Social Media", "Analytics"],
    featured: true,
    remote: false,
    logo: "M",
    logoColor: "0668E1",
  },
  {
    id: 12,
    title: "UX/UI Designer",
    company: "Adobe",
    location: "giza",
    type: "part-time",
    salary: 22000,
    salaryRange: "18,000 - 25,000",
    experience: "entry",
    category: "design",
    posted: "3 days ago",
    applicants: "90+",
    description:
      "Create stunning user interfaces for Adobe Creative Cloud products.",
    skills: ["Adobe XD", "Photoshop", "Illustrator", "Prototyping"],
    featured: false,
    remote: false,
    logo: "A",
    logoColor: "FF0000",
  },
];

// State Management
let currentPage = 1;
const jobsPerPage = 6;
let activeFilters = {
  category: "all",
  locations: [],
  types: [],
  experience: [],
  salary: 5000,
  search: "",
};

// Initialize
document.addEventListener("DOMContentLoaded", function () {
  renderJobs();
  setupEventListeners();
  setupMobileMenu();
  updateStats();
});

function setupMobileMenu() {
  const menuToggle = document.getElementById("mobileMenuToggle");
  const drawer = document.getElementById("mobileDrawer");
  const overlay = document.getElementById("drawerOverlay");
  const closeBtn = document.getElementById("drawerClose");

  function openMenu() {
    drawer.classList.add("open");
    overlay.classList.add("open");
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    drawer.classList.remove("open");
    overlay.classList.remove("open");
    document.body.style.overflow = "";
  }

  menuToggle?.addEventListener("click", openMenu);
  closeBtn?.addEventListener("click", closeMenu);
  overlay?.addEventListener("click", closeMenu);
}

function renderJobs() {
  const container = document.getElementById("jobsContainer");
  const emptyState = document.getElementById("emptyState");

  let jobs = filterJobs();
  jobs = sortJobs(jobs);

  const totalJobs = jobs.length;
  const totalPages = Math.ceil(totalJobs / jobsPerPage);
  const start = (currentPage - 1) * jobsPerPage;
  const end = start + jobsPerPage;
  const paginatedJobs = jobs.slice(start, end);

  updateShowingInfo(start + 1, Math.min(end, totalJobs), totalJobs);
  renderPagination(totalPages);

  if (paginatedJobs.length === 0) {
    container.innerHTML = "";
    emptyState.classList.add("show");
  } else {
    emptyState.classList.remove("show");
    container.innerHTML = paginatedJobs
      .map((job) => createJobCard(job))
      .join("");
  }

  updateActiveFilters();
}

function createJobCard(job) {
  const badges = [];
  if (job.featured)
    badges.push('<span class="badge badge-featured">Featured</span>');
  if (job.urgent) badges.push('<span class="badge badge-urgent">Urgent</span>');
  if (job.remote) badges.push('<span class="badge badge-remote">Remote</span>');
  badges.push('<span class="badge badge-new">New</span>');

  const locationMap = {
    cairo: "Cairo, Egypt",
    alexandria: "Alexandria, Egypt",
    giza: "Giza, Egypt",
    remote: "Egypt (Remote)",
  };

  return `
                <article class="job-card ${job.featured ? "featured" : ""}" data-id="${job.id}">
                    <div class="job-card-inner">
                        <div class="job-card-header">
                            <div class="company-logo">
                                <img src="https://via.placeholder.com/70x70/${job.logoColor}/FFFFFF?text=${job.logo}" alt="${job.company}" loading="lazy">
                            </div>
                            <div class="job-card-info">
                                <div class="job-title-row">
                                    <h3 class="job-title">${job.title}</h3>
                                    <div class="job-badges">${badges.join("")}</div>
                                </div>
                                <div class="job-company">
                                    <i class="fa-solid fa-building"></i>
                                    ${job.company} • ${locationMap[job.location]}
                                </div>
                                <div class="job-meta">
                                    <span class="job-meta-item">
                                        <i class="fa-solid fa-briefcase"></i>
                                        ${job.type.replace("-", " ").replace(/\b\w/g, (l) => l.toUpperCase())}
                                    </span>
                                    <span class="job-meta-item">
                                        <i class="fa-solid fa-clock"></i>
                                        ${job.posted}
                                    </span>
                                    <span class="job-meta-item">
                                        <i class="fa-solid fa-users"></i>
                                        ${job.applicants} applicants
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="job-card-body">
                            <p class="job-description">${job.description}</p>
                            <div class="job-skills">
                                ${job.skills.map((skill) => `<span class="skill-tag">${skill}</span>`).join("")}
                            </div>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                ${job.salaryRange} <span>EGP / month</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn-icon" onclick="toggleSave(this)" aria-label="Save job">
                                    <i class="fa-regular fa-bookmark"></i>
                                </button>
                                <a href="#" class="btn-apply">
                                    Apply Now
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            `;
}

function filterJobs() {
  return jobsData.filter((job) => {
    if (
      activeFilters.category !== "all" &&
      job.category !== activeFilters.category
    )
      return false;
    if (
      activeFilters.locations.length > 0 &&
      !activeFilters.locations.includes(job.location)
    )
      return false;
    if (
      activeFilters.types.length > 0 &&
      !activeFilters.types.includes(job.type)
    )
      return false;
    if (
      activeFilters.experience.length > 0 &&
      !activeFilters.experience.includes(job.experience)
    )
      return false;
    if (job.salary < activeFilters.salary) return false;

    if (activeFilters.search) {
      const searchTerm = activeFilters.search.toLowerCase();
      const matchTitle = job.title.toLowerCase().includes(searchTerm);
      const matchCompany = job.company.toLowerCase().includes(searchTerm);
      const matchSkills = job.skills.some((s) =>
        s.toLowerCase().includes(searchTerm),
      );
      if (!matchTitle && !matchCompany && !matchSkills) return false;
    }

    return true;
  });
}

function sortJobs(jobs) {
  const sortType = document.getElementById("sortSelect").value;

  switch (sortType) {
    case "newest":
      return jobs;
    case "oldest":
      return [...jobs].reverse();
    case "salary-high":
      return [...jobs].sort((a, b) => b.salary - a.salary);
    case "salary-low":
      return [...jobs].sort((a, b) => a.salary - b.salary);
    default:
      return jobs;
  }
}

function renderPagination(totalPages) {
  const pagination = document.getElementById("pagination");
  if (totalPages <= 1) {
    pagination.innerHTML = "";
    return;
  }

  let html = "";

  html += `
                <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
                    <a class="page-link" onclick="changePage(${currentPage - 1})" aria-label="Previous page">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            `;

  const maxVisible = 5;
  let startPage = Math.max(1, currentPage - Math.floor(maxVisible / 2));
  let endPage = Math.min(totalPages, startPage + maxVisible - 1);

  if (endPage - startPage < maxVisible - 1) {
    startPage = Math.max(1, endPage - maxVisible + 1);
  }

  if (startPage > 1) {
    html += `<li class="page-item"><a class="page-link" onclick="changePage(1)">1</a></li>`;
    if (startPage > 2)
      html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
  }

  for (let i = startPage; i <= endPage; i++) {
    html += `<li class="page-item ${i === currentPage ? "active" : ""}">
                    <a class="page-link" onclick="changePage(${i})" ${i === currentPage ? 'aria-current="page"' : ""}>${i}</a>
                </li>`;
  }

  if (endPage < totalPages) {
    if (endPage < totalPages - 1)
      html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    html += `<li class="page-item"><a class="page-link" onclick="changePage(${totalPages})">${totalPages}</a></li>`;
  }

  html += `
                <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
                    <a class="page-link" onclick="changePage(${currentPage + 1})" aria-label="Next page">
                        <i class="fa-solid fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            `;

  pagination.innerHTML = html;
}

function changePage(page) {
  if (page < 1) return;
  const totalPages = Math.ceil(filterJobs().length / jobsPerPage);
  if (page > totalPages) return;

  currentPage = page;
  renderJobs();

  // Smooth scroll to top of results
  const filterSection = document.querySelector(".filter-section");
  const offset = filterSection.offsetTop + filterSection.offsetHeight;
  window.scrollTo({ top: offset, behavior: "smooth" });
}

function updateShowingInfo(start, end, total) {
  document.getElementById("showingStart").textContent = total === 0 ? 0 : start;
  document.getElementById("showingEnd").textContent = end;
  document.getElementById("showingTotal").textContent = total.toLocaleString();
}

function setupEventListeners() {
  // Category buttons
  document.querySelectorAll(".filter-btn[data-category]").forEach((btn) => {
    btn.addEventListener("click", function () {
      document
        .querySelectorAll(".filter-btn[data-category]")
        .forEach((b) => b.classList.remove("active"));
      this.classList.add("active");
      activeFilters.category = this.dataset.category;
      currentPage = 1;
      renderJobs();
    });
  });

  // Location filters
  document.querySelectorAll(".location-filter").forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        activeFilters.locations.push(this.value);
      } else {
        activeFilters.locations = activeFilters.locations.filter(
          (l) => l !== this.value,
        );
      }
      currentPage = 1;
      renderJobs();
    });
  });

  // Type filters
  document.querySelectorAll(".type-filter").forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        activeFilters.types.push(this.value);
      } else {
        activeFilters.types = activeFilters.types.filter(
          (t) => t !== this.value,
        );
      }
      currentPage = 1;
      renderJobs();
    });
  });

  // Experience filters
  document.querySelectorAll(".exp-filter").forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        activeFilters.experience.push(this.value);
      } else {
        activeFilters.experience = activeFilters.experience.filter(
          (e) => e !== this.value,
        );
      }
      currentPage = 1;
      renderJobs();
    });
  });

  // Salary range
  const salaryRange = document.getElementById("salaryRange");
  const salaryValue = document.getElementById("salaryValue");
  salaryRange.addEventListener("input", function () {
    activeFilters.salary = parseInt(this.value);
    salaryValue.textContent = parseInt(this.value).toLocaleString() + "+ EGP";
    currentPage = 1;
    renderJobs();
  });

  // Search with debounce
  const searchInput = document.getElementById("searchInput");
  let searchTimeout;
  searchInput.addEventListener("input", function () {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
      activeFilters.search = this.value;
      currentPage = 1;
      renderJobs();
    }, 300);
  });

  // Sort
  document.getElementById("sortSelect").addEventListener("change", () => {
    renderJobs();
  });

  // Mobile filters
  const mobileFilterBtn = document.getElementById("mobileFilterBtn");
  const sidebarFilters = document.getElementById("sidebarFilters");
  const filterOverlay = document.getElementById("filterOverlay");

  mobileFilterBtn?.addEventListener("click", () => {
    sidebarFilters.classList.add("show");
    filterOverlay.classList.add("show");
    document.body.style.overflow = "hidden";
  });

  filterOverlay?.addEventListener("click", () => {
    sidebarFilters.classList.remove("show");
    filterOverlay.classList.remove("show");
    document.body.style.overflow = "";
  });

  // Scroll to top
  const scrollTop = document.getElementById("scrollTop");
  let scrollTimeout;

  window.addEventListener(
    "scroll",
    () => {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(() => {
        if (window.pageYOffset > 500) {
          scrollTop.classList.add("show");
        } else {
          scrollTop.classList.remove("show");
        }
      }, 100);
    },
    { passive: true },
  );

  scrollTop?.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

function updateActiveFilters() {
  const container = document.getElementById("activeFilters");
  const filters = [];

  if (activeFilters.category !== "all") {
    filters.push({ label: activeFilters.category, type: "category" });
  }

  const locationLabels = {
    cairo: "Cairo",
    alexandria: "Alexandria",
    giza: "Giza",
    remote: "Remote",
  };
  activeFilters.locations.forEach((loc) => {
    filters.push({ label: locationLabels[loc], type: "location", value: loc });
  });

  activeFilters.types.forEach((type) => {
    filters.push({ label: type.replace("-", " "), type: "type", value: type });
  });

  const expLabels = {
    entry: "Entry Level",
    mid: "Mid Level",
    senior: "Senior Level",
  };
  activeFilters.experience.forEach((exp) => {
    filters.push({ label: expLabels[exp], type: "experience", value: exp });
  });

  if (activeFilters.search) {
    filters.push({ label: `Search: ${activeFilters.search}`, type: "search" });
  }

  if (activeFilters.salary > 5000) {
    filters.push({
      label: `Min: ${activeFilters.salary.toLocaleString()} EGP`,
      type: "salary",
    });
  }

  container.innerHTML = filters
    .map(
      (f) => `
                <div class="filter-tag">
                    ${f.label}
                    <button onclick="removeFilter('${f.type}', '${f.value || ""}')" aria-label="Remove filter">×</button>
                </div>
            `,
    )
    .join("");
}

function removeFilter(type, value) {
  switch (type) {
    case "category":
      activeFilters.category = "all";
      document.querySelectorAll(".filter-btn[data-category]").forEach((b) => {
        b.classList.toggle("active", b.dataset.category === "all");
      });
      break;
    case "location":
      activeFilters.locations = activeFilters.locations.filter(
        (l) => l !== value,
      );
      document.querySelector(`.location-filter[value="${value}"]`).checked =
        false;
      break;
    case "type":
      activeFilters.types = activeFilters.types.filter((t) => t !== value);
      document.querySelector(`.type-filter[value="${value}"]`).checked = false;
      break;
    case "experience":
      activeFilters.experience = activeFilters.experience.filter(
        (e) => e !== value,
      );
      document.querySelector(`.exp-filter[value="${value}"]`).checked = false;
      break;
    case "search":
      activeFilters.search = "";
      document.getElementById("searchInput").value = "";
      break;
    case "salary":
      activeFilters.salary = 5000;
      document.getElementById("salaryRange").value = 5000;
      document.getElementById("salaryValue").textContent = "50,000+ EGP";
      break;
  }
  currentPage = 1;
  renderJobs();
}

function resetFilters() {
  activeFilters = {
    category: "all",
    locations: [],
    types: [],
    experience: [],
    salary: 5000,
    search: "",
  };

  document.querySelectorAll(".filter-btn[data-category]").forEach((b) => {
    b.classList.toggle("active", b.dataset.category === "all");
  });
  document
    .querySelectorAll('input[type="checkbox"]')
    .forEach((cb) => (cb.checked = false));
  document.getElementById("searchInput").value = "";
  document.getElementById("salaryRange").value = 5000;
  document.getElementById("salaryValue").textContent = "50,000+ EGP";

  currentPage = 1;
  renderJobs();

  // Close mobile filters if open
  document.getElementById("sidebarFilters")?.classList.remove("show");
  document.getElementById("filterOverlay")?.classList.remove("show");
  document.body.style.overflow = "";
}

function applyFilters() {
  document.getElementById("sidebarFilters")?.classList.remove("show");
  document.getElementById("filterOverlay")?.classList.remove("show");
  document.body.style.overflow = "";
}

function toggleSave(btn) {
  btn.classList.toggle("saved");
  const icon = btn.querySelector("i");
  if (btn.classList.contains("saved")) {
    icon.classList.remove("fa-regular");
    icon.classList.add("fa-solid");
  } else {
    icon.classList.remove("fa-solid");
    icon.classList.add("fa-regular");
  }
}

function updateStats() {
  document.getElementById("totalJobsCount").textContent =
    jobsData.length.toLocaleString();
}
