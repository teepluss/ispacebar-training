importScripts('/js/sw/cache-polyfill/index.js');
// self.addEventListener('install', function(event) {
//   self.skipWaiting();
//   console.log('Installed', event);
// });
// self.addEventListener('activate', function(event) {
//   console.log('Activated', event);
// });
// self.addEventListener('push', function(event) {
//   console.log('Push message received', event);
//   // TODO
// });


self.addEventListener('install', function(e) {
 e.waitUntil(
   // caches.open('airhorner').then(function(cache) {
   //   return cache.addAll([
   //     '/',
   //     '/index.html',
   //     '/index.html?homescreen=1',
   //     '/?homescreen=1',
   //     '/styles/main.css',
   //     '/scripts/main.min.js',
   //     '/sounds/airhorn.mp3'
   //   ]);
   // })
 );
});