jQuery(function() {

/* Polyfill */
Stickyfill.add(document.querySelectorAll('#p-sidebar-fixed'));

/* Object Fit(IE) */
objectFitImages();

// Parallax
const parallaxOptions = { root: null, rootMargin: '0px', threshold: [0.25] };
var parallaxItems = [].slice.call(document.querySelectorAll('.js-anim'));
let parallaxItemObserver = new IntersectionObserver(function(entries, observer) {
	entries.forEach(function(entry) {
		if (entry.isIntersecting) {
			let parallaxItem = entry.target;
			parallaxItem.classList.add('is-anim');
			parallaxItemObserver.unobserve(parallaxItem);
		}
	});
}, parallaxOptions);

parallaxItems.forEach(function(parallaxItem) {
	parallaxItemObserver.observe(parallaxItem);
});

// LazyLoad
// https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
const lazyOptions = { root: null, rootMargin: '0px', threshold: [0] };
var lazyItems = [].slice.call(document.querySelectorAll('.js-lazy'));
lazyItems.forEach(function(lazyItem) {
	lazyItem.setAttribute('data-src', lazyItem.src);
	lazyItem.src = '';
});
let lazyItemObserver = new IntersectionObserver(function(entries, observer) {
	entries.forEach(function(entry) {
		if (entry.isIntersecting) {
			let lazyItem = entry.target;
			console.log(lazyItem);
			if (lazyItem.dataset.hasOwnProperty('src')) {
				lazyItem.src = lazyItem.dataset.src;
			}
			if (lazyItem.dataset.hasOwnProperty('srcset')) {
				lazyItem.srcset = lazyItem.dataset.srcset;
			}
			lazyItem.classList.remove('js-lazy');
			lazyItemObserver.unobserve(lazyItem);
		}
	});
}, lazyOptions);

lazyItems.forEach(function(lazyItem) {
	lazyItemObserver.observe(lazyItem);
});

});
