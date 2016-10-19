function doAjax(url, method, data, callback) {
	$.ajax(url, {
		type: method,
		data: data
	}).done(callback);
}

// Taken from https://github.com/cameronholland90/reddit.dev/blob/master/public/js/votes.js
$(document).ready(function() {
	$('.vote').on('click', function() {
		if ($('#is-logged-in').val() == '1') {
			console.log("does this work?????");
			var data = {
				_token: $('#csrf-token').val(),
				vote: $(this).data('vote'),
				post_id: $(this).data('postId')
			};

			var url = $('#vote-url').val();

			var callback = function(data) {
				$('#vote-score').text(data.vote_score);
				$('.vote').removeClass('active');
				$('[data-vote="' + data.vote + '"]').addClass('active');
			}

			doAjax(url, "POST", data, callback);
		}
	})
})