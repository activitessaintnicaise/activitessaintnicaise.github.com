---
layout: null
---

'use strict';
const staticCacheName = 'version-{{site.time | date: '%Y%m%d%H%M%S'}}::';

console.log("installing service worker");

const filesToCache = [
  "/",
  {% for page in site.html_pages %}
    '{{ page.url }}',
  {% endfor %}
  {% for post in site.posts %}
    '{{ post.url }}',
  {% endfor %}

  // can be automated rather than manual entries
  "/assets/img/activites-saint-nicaise-logo.png",
  "/assets/img/cannage.jpg",
  "/assets/img/nettoyage-tableaux.jpg",
  "/assets/img/patchwork.jpg",
  "/assets/img/restauration-fauteuil.jpg",
  "/assets/img/tapisserie-aiguille.jpg",
  "/assets/themes/twitter/bootstrap/css/bootstrap-responsive.css",
  "/assets/themes/twitter/bootstrap/css/bootstrap.min.css",
  "/assets/themes/twitter/css/style.css",
  "/index.html"
];

self.addEventListener("install", function(e){
  self.skipWaiting();
  e.waitUntil(
    caches.open(staticCacheName).then(function(cache){
      return cache.addAll(filesToCache);
    })
  )
});

self.addEventListener("activate", function(e){
  e.waitUntil(
    caches.keys().then(function(cacheNames){
      return Promise.all(
        cacheNames.filter(function(cacheName){
          return cacheName.startsWith("version-")
            && cacheName != staticCacheName;
        }).map(function(cacheName){
          return cache.delete(cacheName);
        })
      )
    })
  )
});

self.addEventListener("fetch", function(e){
  e.respondWith(
     caches.match(e.request).then(function(response) {
       return response || fetch(e.request);
     })
   )
});