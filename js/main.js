hljs.initHighlightingOnLoad();

var $button = $('.button-edit');

$button.on('click', function(e) {
  e.preventDefault();

  $('*').toggleClass('edit-example');
});
