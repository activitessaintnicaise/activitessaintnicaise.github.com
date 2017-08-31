---
layout: null
---

'use strict';
const staticCacheName = 'version-{{site.time | date: '%Y%m%d%H%M%S'}}';
const pagesCacheName  = 'pages';
const imagesCacheName = 'images';

const cacheList = [
    staticCacheName,
    pagesCacheName,
    imagesCacheName
];


const offlinePages = [
    "/",
    {% for page in site.html_pages %}
      '{{ page.url }}',
    {% endfor %}
    {% for post in site.posts %}
      '{{ post.url }}',
    {% endfor %}
    '/index.html'
];


function updateStaticCache() {
    return caches.open(staticCacheName)
        .then( cache => {
            // These items won't block the installation of the Service Worker
            cache.addAll([
              "/assets/img/activites-saint-nicaise-logo.png",
              "/assets/img/cannage.jpg",
              "/assets/img/nettoyage-tableaux.jpg",
              "/assets/img/patchwork.jpg",
              "/assets/img/restauration-fauteuil.jpg",
              "/assets/img/tapisserie-aiguille.jpg",
              "assets/img/activite-patchwork/IMG_1357.JPG",
              "assets/img/activite-patchwork/IMG_1360.JPG",
              "assets/img/activite-patchwork/IMG_1365.JPG",
              "assets/img/activite-patchwork/IMG_1363.JPG",
              "assets/img/activite-patchwork/IMG_1366.JPG", 
              "assets/img/activite-patchwork/IMG_1379.JPG", 
              "assets/img/activite-refection-fauteuil/IMG_1262.JPG",
              "assets/img/activite-refection-fauteuil/IMG_1295.JPG",
              "assets/img/activite-refection-fauteuil/IMG_1219.JPG",
              "assets/img/activite-refection-fauteuil/IMG_1212.JPG",
              "assets/img/activite-refection-fauteuil/IMG_1241.JPG",
              "assets/img/activite-refection-fauteuil/IMG_1256.JPG",
            ].concat(offlinePages));
            // These items must be cached for the Service Worker to complete installation
            return cache.addAll([
              "/assets/themes/twitter/bootstrap/css/bootstrap-responsive.css",
              "/assets/themes/twitter/bootstrap/css/bootstrap.min.css",
              "/assets/themes/twitter/css/style.css",
            ]);
        });
}

function stashInCache(cacheName, request, response) {
    caches.open(cacheName)
        .then( cache => cache.put(request, response) );
}

// Limit the number of items in a specified cache.
function trimCache(cacheName, maxItems) {
    caches.open(cacheName)
        .then( cache => {
            cache.keys()
                .then(keys => {
                    if (keys.length > maxItems) {
                        cache.delete(keys[0])
                            .then(trimCache(cacheName, maxItems));
                    }
                });
        });
}

// Remove caches whose name is no longer valid
function clearOldCaches() {
    return caches.keys()
        .then( keys => {
            return Promise.all(keys
                .filter(key => !cacheList.includes(key))
                .map(key => caches.delete(key))
            );
        });
}

self.addEventListener('install', event => {
    event.waitUntil(updateStaticCache()
        .then( () => self.skipWaiting() )
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(clearOldCaches()
        .then( () => self.clients.claim() )
    );
});

self.addEventListener('message', event => {
    if (event.data.command == 'trimCaches') {
        trimCache(pagesCacheName, 35);
        trimCache(imagesCacheName, 20);
    }
});

self.addEventListener("fetch", function(e){
  e.respondWith(
     caches.match(e.request).then(function(response) {
       return response || fetch(e.request);
     })
   )
});
