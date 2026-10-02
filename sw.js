// sw.js - Place this in your root directory (same folder as .htaccess)
const CACHE_NAME = 'dps-main-cache-v1';
const IMAGE_CACHE_NAME = 'dps-images-v1';

// Domains that need caching (your external image servers)
const IMAGE_DOMAINS = [
  'dps.allenhouseschools.com',
  'myschool-assets.s3.ap-south-1.amazonaws.com',
  'dpseldeco.com',
  'dpsunnao.com'
];

// Install event
self.addEventListener('install', (event) => {
  console.log('Service Worker installing...');
  self.skipWaiting(); // Activate immediately
});

// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
  console.log('Service Worker activating...');
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cache) => {
          if (cache !== CACHE_NAME && cache !== IMAGE_CACHE_NAME) {
            console.log('Deleting old cache:', cache);
            return caches.delete(cache);
          }
        })
      );
    })
  );
  event.waitUntil(clients.claim()); // Take control immediately
});

// Fetch event - intercept all requests
self.addEventListener('fetch', (event) => {
  const url = new URL(event.request.url);
  
  // Check if this is an image from your problematic domains
  const isProblemImage = IMAGE_DOMAINS.some(domain => 
    url.hostname === domain || url.hostname.endsWith('.' + domain)
  ) && /\.(jpg|jpeg|png|webp|gif|svg)$/i.test(url.pathname);
  
  // Also cache your own CSS/JS from dpskalyanpur.com
  const isStaticAsset = url.hostname === 'dpskalyanpur.com' && 
    /\.(css|js)$/i.test(url.pathname);
  
  if (isProblemImage || isStaticAsset) {
    event.respondWith(
      caches.match(event.request).then((cachedResponse) => {
        if (cachedResponse) {
          // Return cached version
          return cachedResponse;
        }
        
        // Fetch and cache for future
        return fetch(event.request).then((response) => {
          // Only cache successful responses
          if (!response || response.status !== 200) {
            return response;
          }
          
          // Cache the response
          const responseToCache = response.clone();
          caches.open(IMAGE_CACHE_NAME).then((cache) => {
            cache.put(event.request, responseToCache);
          });
          
          return response;
        });
      })
    );
  }
});