
<style id="critical-nav-css">
  .hidden { display: none !important; }
  .flex { display: flex; }
  .block { display: block; }
  .items-center { align-items: center; }
  .justify-between { justify-content: space-between; }
  .justify-end { justify-content: flex-end; }
  .flex-col { flex-direction: column; }
  .gap-1 { gap: 0.25rem; }
  .gap-2 { gap: 0.5rem; }
  .gap-4 { gap: 1rem; }
  .text-white { color: #fff; }
  .no-underline { text-decoration: none; }
  .whitespace-nowrap { white-space: nowrap; }
  .overflow-hidden { overflow: hidden; }
  .overflow-x-auto { overflow-x: auto; }
  .list-none { list-style: none; margin: 0; padding: 0; }
  #esuccessPopup.hidden,
  #popupForm.hidden { display: none !important; }
  @media (min-width: 640px) {
    .sm\:block { display: block !important; }
    .sm\:hidden { display: none !important; }
  }
  @media (min-width: 1024px) {
    .lg\:flex { display: flex !important; }
    .lg\:hidden { display: none !important; }
  }
  .nav-menu-checkbox,
  .mobile-nav-backdrop,
  .NavMenuLogo,
  .bartoggle { display: none; }
  header nav { display: flex; align-items: center; justify-content: space-between; }
  header nav .logo ul,
  header nav .logo + div > ul { list-style: none; margin: 0; padding: 0; }
  .NavMenu { list-style: none; margin: 0; padding: 0; display: flex; justify-content: flex-end; }
  .NavMenu > li { display: inline-block; }
  .NavMenu ul.dps-submenu { display: none; list-style: none; margin: 0; padding: 0; }
  .NavMenu ul.dps-submenu.is-open { display: flex; flex-direction: column; }
  @media (min-width: 1101px) {
    .mobile-nav-panel { display: contents; }
    .NavMenu ul.dps-submenu {
      display: flex;
      flex-direction: column;
      position: absolute;
      visibility: hidden;
      opacity: 0;
    }
  }
  @media (max-width: 1100px) {
    .bartoggle { display: flex; align-items: center; justify-content: center; cursor: pointer; }
    .mobile-nav-panel {
      position: fixed;
      left: 0;
      top: 0;
      width: min(500px, 100%);
      height: 100vh;
      height: 100dvh;
      transform: translateX(-100%);
      overflow: hidden;
      z-index: 10001;
      background: #003618;
    }
    .NavMenuLogo { display: flex; }
    .NavMenu {
      flex-direction: column;
      justify-content: flex-start;
      overflow-y: auto;
    }
    .NavMenu > li { display: block; width: 100%; }
  }
</style>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<script src="assets/js/tailwind.js"></script>

<!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PGPM9GFR');
</script>
<!-- End Google Tag Manager -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<meta name="robots" content="index, follow">
<link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">
<meta name="google-site-verification" content="yGCiC56RhsxH4SnoIb0iCkIDJlw7U_4tGQSC7HOy5fc">

<link rel="preconnect" href="https://dps.allenhouseschools.com" crossorigin>
<link rel="preconnect" href="https://myschool-assets.s3.ap-south-1.amazonaws.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>



<?php
require_once __DIR__ . '/seo.php';
dps_render_og_meta_tags();
?>



<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "https://dpskalyanpur.com/#website",
  "url": "https://dpskalyanpur.com/",
  "name": "Delhi Public School Kalyanpur",
  "alternateName": "DPS Kalyanpur",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://dpskalyanpur.com/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "School",
  "@id": "https://dpskalyanpur.com/#school",
  "name": "Delhi Public School Kalyanpur",
  "alternateName": "DPS Kalyanpur",
  "url": "https://dpskalyanpur.com/",
  "logo": "https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AONKJFjio6pQUZ1wq39Fg5T483Hp1HBsRNqOkvDI.png",
  "image": "https://lh3.googleusercontent.com/p/AF1QipOkyAFhO7fmdaxcYX8ImOqe8JFrqOyycsxE-Zfm=w408-h282-k-no",
  "telephone": "+91-9580362555",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Kalyanpur",
    "addressLocality": "Kanpur",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "208017",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "26.5252293",
    "longitude": "80.2565279"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "15:00"
  },
  "sameAs": [
    "https://www.facebook.com/dpskalyanpur1996/",
    "https://www.instagram.com/dps_kalyanpur_kanpur/",
    "https://www.youtube.com/@DPSKALYANPUR786",
    "https://www.linkedin.com/school/dps-kalyanpur/"
  ]
}
</script>
