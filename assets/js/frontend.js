(function ($) {
	'use strict';
	$('.mdxwpfepa-vote').on('click', function() {
		$('.mdxwpfepa-loading-line').removeClass('mdxwpfepa-hide');
		var btn = $(this);
		btn.addClass('mdxwpfepa-active');
		var fcFrom = $('.mdxwp-form');
		var voteType = btn.data('vote-type');
		var postId = btn.data('post-id')
		$.ajax({
			type: 'POST',
			url: mdxwpfepa_feedback.ajaxurl,
			data: {
				action: 'mdxwpfepa_submit_vote',
				vote_type: voteType,
				post_id: postId,
				security: mdxwpfepa_feedback.mdxwpfepa_nonce,
			},
			success: function(response) {
				$('.mdxwpfepa-loading-line').remove();
				fcFrom.find('.mdxwpfepa-hide').removeClass('mdxwpfepa-hide');
				fcFrom.find('.mdxwpfepa-vote').off('click'); //removing multiple votes and ajax calls
				fcFrom.find('.mdxwpfepa-vote').removeClass('mdxwpfepa-vote');
				if(response.data.result === 1){
					$('#mdxwpfepa-yes').text(response.data.yes);
					$('#mdxwpfepa-no').text(response.data.no);
					if(response.data.user_answer === 1){
						$('.mdxwpfepa-answer-yes').addClass('mdxwpfepa-active');
					}else{
						$('.mdxwpfepa-answer-no').addClass('mdxwpfepa-active');
					}

				};
			},
			error: function(xhr, status, error) {
				console.error('AJAX error:', status, error);
			}
		});


	});
})(jQuery);
