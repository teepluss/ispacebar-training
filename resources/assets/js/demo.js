if ('serviceWorker' in navigator) {
 console.log('Service Worker is supported');
 navigator.serviceWorker.register('/js/sw/sw.js').then(function(reg) {
   console.log(':^)', reg);
   // TODO
 }).catch(function(err) {
   console.log(':^(', err);
 });
}