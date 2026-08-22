jQuery(window).load(function () {

var container = document.querySelector('#front1-content');
var msnry = new Masonry(container, {
	itemSelector: '.recent-article',
	columnWidth: 1
});

var container = document.querySelector('#front2-content');
var msnry = new Masonry(container, {
	itemSelector: '.recent-article',
	columnWidth: 1
});

var container = document.querySelector('#front3-content');
var msnry = new Masonry(container, {
	itemSelector: '.recent-article',
	columnWidth: 1
});

var container = document.querySelector('#archive-content');
var msnry = new Masonry(container, {
	itemSelector: '.recent-article',
	columnWidth: 1
});

});