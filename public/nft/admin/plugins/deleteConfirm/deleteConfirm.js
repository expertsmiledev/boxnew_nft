$(document).ready(function() {
	$(document).on('click', 'a i.fa-trash', function() {
		return confirm('Are you sure to delete this?');
	})
});