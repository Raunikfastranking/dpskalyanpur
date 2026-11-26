<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>

<script src="assets/js/wind.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("scroll", function() {
      if (window.scrollY > 100) {
        document.getElementById("scroll").style.display = "block";
      } else {
        document.getElementById("scroll").style.display = "none";
      }
    });

    document.getElementById("scroll").addEventListener("click", function() {
      setTimeout(function() {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      }, 500); // 500ms delay
    });
  });
</script>

<script>
  const glideElement = document.querySelector('.glide-marque');
  if (glideElement) {
    var glide09 = new Glide('.glide-marque', {
      type: 'carousel',
      autoplay: 1,
      animationDuration: 4500,
      animationTimingFunc: 'linear',
      perView: 3,
      classes: {
        activeNav: '[&>*]:bg-slate-700',
      },
      breakpoints: {
        1024: {
          perView: 2
        },
        640: {
          perView: 1,
          gap: 36
        }
      },
    });

    glide09.mount();
  }
</script>



<script>
  const openEnquiryBtn = document.getElementById('ctaEnquireBtn');
  const closeEnquiryBtn = document.getElementById('customCloseBtn');
  const enquiryPopup = document.getElementById('customEnquiryPopup');

  if (openEnquiryBtn) {
    openEnquiryBtn.addEventListener('click', (e) => {
      e.preventDefault();
      enquiryPopup.classList.remove('hidden');
    });
  }

  if (closeEnquiryBtn) {
    closeEnquiryBtn.addEventListener('click', () => {
      enquiryPopup.classList.add('hidden');
    });
  }

  if (enquiryPopup) {
    enquiryPopup.addEventListener('click', (e) => {
      if (e.target === enquiryPopup) {
        enquiryPopup.classList.add('hidden');
      }
    });
  }
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggles = document.querySelectorAll('input[type="checkbox"]');

    toggles.forEach((toggle) => {
      toggle.addEventListener('change', function() {
        if (this.checked) {
          toggles.forEach((otherToggle) => {
            if (otherToggle !== this) {
              otherToggle.checked = false;
            }
          });
        }
      });
    });
  });
</script>



<script>
  const BASE_URL = "<?= rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'], '/') ?>";
  document.addEventListener("DOMContentLoaded", function() {
     const enquiryForm = document.getElementById("enquiryForm");
const estudent_name = document.getElementById("estudent_name");
const eparent_name = document.getElementById("eparent_name");
const emobile = document.getElementById("emobile");
const eemail = document.getElementById("eemail");
const epincode = document.getElementById("epincode");
const ecity = document.getElementById("ecity");
const esession = document.getElementById("esession");
const egrade = document.getElementById("egrade");
const submitBtn = document.getElementById("submitBtn");
    const popup = document.getElementById("popupForm");
    const closePopupBtn = document.getElementById("closePopup");

    const openDesktop = document.getElementById("openPopupDesktop");
    const openMobile = document.getElementById("openPopupMobile");

    const sessionSelect = document.getElementById("esession");
    const gradeSelect = document.getElementById("egrade");
    const citySelect = document.getElementById("ecity");

    let apiLoaded = false; // ✅ ensure load once only

    function initiatePopupOpen() {
      popup.classList.remove("hidden");
      popup.style.display = "flex";

      if (!apiLoaded) {
        // Load Session
        fetch(`${BASE_URL}/includes/session-api`)
          .then(res => res.text())
          .then(html => sessionSelect.innerHTML += html);

        // Load Grade
        fetch(`${BASE_URL}/includes/grade-api`)
          .then(res => res.text())
          .then(html => gradeSelect.innerHTML += html);

        // Load City
        fetch(`${BASE_URL}/includes/get-city`)
          .then(res => res.text())
          .then(html => citySelect.innerHTML += html);

        apiLoaded = true;
      }
    }

    openDesktop.addEventListener("click", initiatePopupOpen);
    openMobile.addEventListener("click", initiatePopupOpen);

    closePopupBtn.addEventListener("click", function() {
      popup.classList.add("hidden");
    });

    // Optional: close on outside click
    popup.addEventListener("click", function(e) {
      if (e.target === popup) popup.classList.add("hidden");
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {

    /* =========================
       CUSTOM CITY DROPDOWN
    ========================== */
    document.querySelectorAll(".customSelect").forEach(wrapper => {
      const realSelect = wrapper.querySelector("select");
      const display = wrapper.querySelector(".selected-text");
      const dropdown = wrapper.querySelector("div.absolute");
      const searchInput = dropdown.querySelector("input");
      const optionsList = dropdown.querySelector("ul");
      const cityError = document.getElementById("city-error");

      function loadOptions(filter = "") {
        optionsList.innerHTML = "";
        Array.from(realSelect.options).forEach(opt => {
          if (opt.value && opt.text.toLowerCase().includes(filter.toLowerCase())) {
            const li = document.createElement("li");
            li.textContent = opt.text;
            li.dataset.value = opt.value;
            li.className = "p-2 hover:bg-gray-100 cursor-pointer";
            optionsList.appendChild(li);
          }
        });
      }

      display.parentElement.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
        searchInput.value = "";
        loadOptions();
        searchInput.focus();
      });

      searchInput.addEventListener("input", () => {
        loadOptions(searchInput.value);
      });

      optionsList.addEventListener("click", e => {
        if (e.target.tagName === "LI") {
          realSelect.value = e.target.dataset.value;
          display.textContent = e.target.textContent;
          dropdown.classList.add("hidden");

          cityError.classList.add("hidden");
          cityError.style.display = "none";
        }
      });


      document.addEventListener("click", e => {
        if (!wrapper.contains(e.target)) {
          dropdown.classList.add("hidden");
        }
      });
    });

    /* =========================
       LEAD SOURCE
    ========================== */
    (function() {
      const getParam = name => new URLSearchParams(window.location.search).get(name);
      let source = getParam("utm_source") || document.referrer || "";
      const src = source.toLowerCase();

      if (!source) source = "Website";
      else if (src.includes("google")) source = "Google-Ads by Agency";
      else if (src.includes("facebook") || src.includes("meta")) source = "Facebook by Agency";
      else if (src.includes("instagram") || src.includes("ig")) source = "Instagram by Agency";
      else source = "Others";

      if (!sessionStorage.getItem("leadSource")) {
        sessionStorage.setItem("leadSource", source);
      }

      const sourceInput = document.getElementById("source");
      if (sourceInput) sourceInput.value = sessionStorage.getItem("leadSource");
    })();

    /* =========================
       VALIDATION REGEX
    ========================== */
    const nameRegex = /^[A-Za-z\s]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const pincodeRegex = /^[1-9][0-9]{5}$/;

    /* =========================
       ERROR ELEMENTS
    ========================== */
    const studentError = document.getElementById("student-error");
    const parentError = document.getElementById("parent-error");
    const mobileError = document.getElementById("mobile-error");
    const emailError = document.getElementById("email-error");
    const pincodeError = document.getElementById("pincode-error");
    const cityError = document.getElementById("city-error");

    /* =========================
       HOSTEL + GRADE FILTERING
    ========================== */
    const hostelSelect = document.getElementById("ehostel_facility");
    const hostelError = document.getElementById("ehostel-error");
    const gradeSelect = document.getElementById("egrade");
    const gradeError = document.getElementById("classError");

    function normalizeGradeLabel(label) {
    return String(label || "").trim().toUpperCase().replace(/[.\s]/g, "");
}

    function gradeToClassNumber(label) {
      const g = normalizeGradeLabel(label);
      if (g === "PG") return 0;
      if (/^\d+$/.test(g)) return Number(g);
      const romanMap = {
        I: 1, II: 2, III: 3, IV: 4, V: 5, VI: 6,
        VII: 7, VIII: 8, IX: 9, X: 10, XI: 11, XII: 12
      };
      return romanMap[g] ?? null;
    }

    const masterGradeOptions = Array.from(gradeSelect?.options || [])
      .map(o => ({ value: o.value, label: (o.textContent || "").trim() }))
      .filter(o => o.value && o.label);

    function setGradeOptions(options) {
      if (!gradeSelect) return;
      gradeSelect.innerHTML = "";

      const placeholder = document.createElement("option");
      placeholder.value = "";
      placeholder.disabled = true;
      placeholder.selected = true;
      placeholder.textContent = "Select Grade";
      gradeSelect.appendChild(placeholder);

      if (!Array.isArray(options) || options.length === 0) {
        const emptyOpt = document.createElement("option");
        emptyOpt.value = "";
        emptyOpt.textContent = "No classes available";
        gradeSelect.appendChild(emptyOpt);
        return;
      }

      options.forEach(opt => {
        const o = document.createElement("option");
        o.value = opt.value;
        o.textContent = opt.label;
        gradeSelect.appendChild(o);
      });
    }

   function syncPopupGrades() {
    if (!gradeSelect) return;
    const hostelFacility = hostelSelect ? hostelSelect.value : "";

    if (!hostelFacility) {
        gradeSelect.disabled = true;
        gradeSelect.innerHTML = "";
        const placeholder = document.createElement("option");
        placeholder.value = "";
        placeholder.disabled = true;
        placeholder.selected = true;
        placeholder.textContent = "Select Hostel Facility first";
        gradeSelect.appendChild(placeholder);
        return;
    }

    // Allowed grades when hostel = YES (exact names, normalized)
    const allowedYes = new Set([
        "VI", "VII", "VIII", "IX", "X", "XI", "XII"
    ]);

    // Allowed grades when hostel = NO (all grades)
    const allowedNo = new Set([
        "PG", "NURSERY", "PREP",
        "I", "II", "III", "IV", "V",
        "VI", "VII", "VIII", "IX", "X", "XI", "XII"
    ]);

    const allowedSet = hostelFacility === "YES" ? allowedYes : allowedNo;

    // Filter masterGradeOptions (original labels) using normalized comparison
    const filtered = masterGradeOptions.filter(opt => {
        const norm = normalizeGradeLabel(opt.label);
        return allowedSet.has(norm);
    });

    gradeSelect.disabled = false;
    setGradeOptions(filtered);
}

    hostelSelect?.addEventListener("change", function() {
      hostelError?.classList.add("hidden");
      gradeError?.classList.add("hidden");
      syncPopupGrades();
    });

    syncPopupGrades();

    /* =========================
       LIVE INPUT VALIDATION
    ========================== */
    estudent_name.addEventListener("input", function() {
      this.value = this.value.slice(0, 50);
      studentError.classList.toggle("hidden", nameRegex.test(this.value));
    });

    eparent_name.addEventListener("input", function() {
      this.value = this.value.slice(0, 50);
      parentError.classList.toggle("hidden", nameRegex.test(this.value));
    });

    emobile.addEventListener("input", function() {
      this.value = this.value.replace(/\D/g, '').slice(0, 10);
      mobileError.classList.toggle("hidden", mobileRegex.test(this.value));
    });

    eemail.addEventListener("input", function() {
      this.value = this.value.toLowerCase();
      emailError.classList.toggle("hidden", emailRegex.test(this.value));
    });

    epincode.addEventListener("input", function() {
      this.value = this.value.replace(/\D/g, '').slice(0, 6);
      pincodeError.classList.toggle("hidden", pincodeRegex.test(this.value));
    });

    /* =========================
       FORM SUBMIT
    ========================== */
    enquiryForm.addEventListener("submit", function(e) {
      e.preventDefault();

      const hostelFacility = hostelSelect ? hostelSelect.value : "";

      const payload = {
        session: esession.value.trim(),
        grade: (gradeSelect ? gradeSelect.value : "").trim(),
        name: estudent_name.value.trim(),
        parent_name: eparent_name.value.trim(),
        phone: emobile.value.trim(),
        email: eemail.value.trim(),
        city: ecity.value.trim(),
        pincode: epincode.value.trim(),
        source: sessionStorage.getItem("leadSource") || "Website",
        source_type: "Website",
        enquiry_type: "Digital",
        message: `Hostel Facility: ${hostelFacility}. This Message From DPS Kalyanpur Website`,
        subject: "Hostel Enquiry",
        hostel: hostelFacility === "YES" ? "1" : "0",
        branch_id: 9,
        school_id: 1,
        language_id: 1
      };

      let isValid = true;

      if (!hostelFacility) {
        hostelError?.classList.remove("hidden");
        isValid = false;
      } else {
        hostelError?.classList.add("hidden");
      }

      if (hostelFacility && !payload.grade) {
        gradeError?.classList.remove("hidden");
        isValid = false;
      } else {
        gradeError?.classList.add("hidden");
      }

      if (!nameRegex.test(payload.name)) isValid = false;
      if (!nameRegex.test(payload.parent_name)) isValid = false;
      if (!mobileRegex.test(payload.phone)) isValid = false;
      if (!emailRegex.test(payload.email)) isValid = false;
      if (!pincodeRegex.test(payload.pincode)) isValid = false;

      // ✅ CITY VALIDATION
    if (!ecity.value.trim()) {
      cityError.classList.remove("hidden");
      isValid = false;
    } else {
      cityError.classList.add("hidden");
    }



      if (!isValid) return;

      submitBtn.disabled = true;
      submitBtn.textContent = "Submitting...";

      fetch("proxy/admission-proxy", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(() => {
          document.getElementById("esuccessPopup").classList.remove("hidden");
          enquiryForm.reset();
          document.querySelector(".selected-text").textContent = "Select City";
          syncPopupGrades();
          submitBtn.disabled = false;
          submitBtn.textContent = "Submit";
          document.getElementById("popupForm").classList.add("hidden");
            setTimeout(() => {
          document.getElementById("esuccessPopup").classList.add("hidden");
        }, 20000);
        })
        .catch(() => alert("Submission failed"));
    });

  });
</script>


<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Find all custom selects
    document.querySelectorAll(".customSelect").forEach(wrapper => {
      const realSelect = wrapper.querySelector("select");
      const display = wrapper.querySelector(".selected-text");
      const dropdown = wrapper.querySelector("div.absolute");
      const searchInput = dropdown.querySelector("input");
      const optionsList = dropdown.querySelector("ul");

      // Load options into custom dropdown
      function loadOptions(filter = "") {
        optionsList.innerHTML = "";
        Array.from(realSelect.options).forEach(opt => {
          if (opt.value && opt.text.toLowerCase().includes(filter.toLowerCase())) {
            let li = document.createElement("li");
            li.textContent = opt.text;
            li.className = "p-2 hover:bg-gray-100 cursor-pointer";
            li.dataset.value = opt.value;
            optionsList.appendChild(li);
          }
        });
      }

      // Show dropdown
      display.parentElement.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
        searchInput.value = "";
        loadOptions();
        searchInput.focus();
      });

      // Filter on search
      searchInput.addEventListener("input", () => {
        loadOptions(searchInput.value);
      });

      // Select option
      optionsList.addEventListener("click", (e) => {
        if (e.target.tagName === "LI") {
          const value = e.target.dataset.value;
          const text = e.target.textContent;
          realSelect.value = value; // Set value in real select
          display.textContent = text;
          dropdown.classList.add("hidden");
        }
      });

      // Click outside to close
      document.addEventListener("click", (e) => {
        if (!wrapper.contains(e.target)) {
          dropdown.classList.add("hidden");
        }
      });
    });
  });

  (function() {
    function getParam(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    let source = getParam("utm_source") || document.referrer || "";
    console.log("Initial Source:", source);
    const src = source.toLowerCase();

    // Determine the correct source
    if (!source) {
      source = "Website";
    } else if (src.includes("google")) {
      source = "Google-Ads by Agency";
      console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
    } else if (src.includes("facebook") || src.includes("meta")) {
      source = "Facebook by Agency";
    } else if (src.includes("instagram") || src.includes("ig")) {
      source = "Instagram by Agency";
    } else {
      // Any unknown platform → set to "Others"
      source = "Others";
      console.log("Unrecognized platform, setting source to 'Others'");
    }

    // Save in sessionStorage only if not already saved
    if (!sessionStorage.getItem("leadSource")) {
      sessionStorage.setItem("leadSource", source);
    }

    const finalSource = sessionStorage.getItem("leadSource");
    const sourceInput = document.getElementById("source");

    if (sourceInput) {
      sourceInput.value = finalSource;
    }

    console.log("Captured Source:", finalSource);
  })();


  // Validation regex patterns
  const nameRegex = /^[A-Za-z\s]+$/;
  const mobileRegex = /^[6-9]\d{9}$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const pincodeRegex = /^[1-9][0-9]{5}$/;

  // Error elements
  const studentError = document.getElementById("student-error");
  const parentError = document.getElementById("parent-error");
  const mobileError = document.getElementById("mobile-error");
  const emailError = document.getElementById("email-error");
  const pincodeError = document.getElementById("pincode-error");

  document.getElementById("estudent_name").addEventListener("input", function() {
    this.value = this.value.slice(0, 50);
    studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
  });

  document.getElementById("eparent_name").addEventListener("input", function() {
    this.value = this.value.slice(0, 50);
    parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
  });
  document.getElementById("emobile").addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 10);
    mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
  });
  document.getElementById("eemail").addEventListener("input", function() {
    this.value = this.value.toLowerCase();
    emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
  });
  document.getElementById("epincode").addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 6);
    pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
  });
  // Submit Validation
  document.getElementById("enquiryForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Inputs
    const egrade = document.getElementById("egrade").value.trim();
    const estudent_name = document.getElementById("estudent_name").value.trim();
    const eparent_name = document.getElementById("eparent_name").value.trim();
    const emobile = document.getElementById("emobile").value.trim();
    const eemail = document.getElementById("eemail").value.trim();
    const ecity = document.getElementById("ecity").value.trim();
    const epincode = document.getElementById("epincode").value.trim();
    const esession = document.getElementById("esession").value.trim();
    const source = sessionStorage.getItem("leadSource") || "Website";
    let isValid = true;

    if (!nameRegex.test(estudent_name)) {
      studentError.textContent = "Only letters and spaces allowed.";
      isValid = false;
    }

    if (!nameRegex.test(eparent_name)) {
      parentError.textContent = "Only letters and spaces allowed.";
      isValid = false;
    }

    if (!mobileRegex.test(emobile)) {
      mobileError.classList.remove("hidden");
      isValid = false;
    }

    if (!emailRegex.test(eemail)) {
      emailError.classList.remove("hidden");
      isValid = false;
    }

    if (!pincodeRegex.test(epincode)) {
      pincodeError.classList.remove("hidden");
      isValid = false;
    }

    if (!isValid) return; // STOP submission if any field is invalid
    const submitBtn = document.getElementById("submitBtn");
    submitBtn.disabled = true;
    submitBtn.textContent = "Submitting...";

    const payload = {
      session: esession,
      grade: egrade,
      name: estudent_name,
      parent_name: eparent_name,
      phone: emobile,
      email: eemail,
      city: ecity,
      pincode: epincode,
      source: source,
      source_type: "Website",
      enquiry_type: "Digital",
      message: "This Message From DPS Bareilly Website",
      subject: "Admission Enquiry",
      branch_id: 9,
      school_id: 1,
      language_id: 1
    };

    fetch(`proxy/admission-proxy`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
      })
      .then(response => {
        if (!response.ok) throw new Error("Error: " + response.statusText);
        return response.json();
      })
      .then(data => {
        document.getElementById("esuccessPopup").classList.remove("hidden");
        closePopup()
        setTimeout(() => {
          document.getElementById("esuccessPopup").classList.add("hidden");
        }, 20000);
        document.getElementById("enquiryForm").reset();
      })
      .catch(error => {
        alert("There was an error submitting the form.");
        console.error("Error:", error);
      });
  });
</script> -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.dps-menu-toggle').forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        const submenu = this.nextElementSibling;
        if (submenu && submenu.classList.contains('dps-menu-open')) {
          submenu.classList.toggle('hidden-menu');
        }
      });
    });

    document.querySelectorAll('.dps2').forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        const submenu = this.nextElementSibling;
        if (submenu && submenu.classList.contains('dps-menu-openss')) {
          submenu.classList.toggle('hidden-menu');
        }
      });
    });

    document.querySelectorAll('.dps3').forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        const submenu = this.nextElementSibling;
        if (submenu && submenu.classList.contains('dps-menu-opensss')) {
          submenu.classList.toggle('hidden-menu');
        }
      });
    });

  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("popupForm");
    const closeBtn = document.getElementById("closePopup");
    const form = document.getElementById("enquiryForm");
    const submitBtn = document.getElementById("submitBtn");

    function fullResetPopupForm() {

        if (!form) return;

        // Reset form fields
        form.reset();

        // Reset dropdowns
        const session = document.getElementById("esession");
        const grade = document.getElementById("egrade");
        const city = document.getElementById("ecity");

        if (session) session.selectedIndex = 0;
        if (grade) grade.selectedIndex = 0;
        if (city) city.selectedIndex = 0;

        // Reset custom city dropdown UI
        const cityText = document.querySelector(".selected-text");
        if (cityText) cityText.textContent = "Select City";

        // Reset checkbox manually (extra safe)
        const checkbox = document.getElementById("popupCheckbox");
        if (checkbox) checkbox.checked = false;

        // Reset submit button
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
        }

        // Hide all validation errors
        document.querySelectorAll(
          "#student-error, #parent-error, #mobile-error, #email-error, #pincode-error, #city-error, #classError, #checkboxError"
        ).forEach(el => {
            el.classList.add("hidden");
            el.style.display = "none";
        });

        // Remove error borders if any validation added
        document.querySelectorAll("#enquiryForm input, #enquiryForm select").forEach(el => {
            el.classList.remove("border-red-500");
        });
    }

    // Reset when popup CLOSE button clicked
    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            setTimeout(fullResetPopupForm, 100);
        });
    }

    // Reset when clicked outside popup
    if (popup) {
        popup.addEventListener("click", function (e) {
            if (e.target === popup) {
                setTimeout(fullResetPopupForm, 100);
            }
        });
    }

    // Reset after SUCCESS submit (when popup hides)
    const observer = new MutationObserver(() => {
        if (popup.classList.contains("hidden")) {
            fullResetPopupForm();
        }
    });

    observer.observe(popup, { attributes: true, attributeFilter: ['class'] });

});
</script>
