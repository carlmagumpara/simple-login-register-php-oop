<script type="text/javascript">
	$(document).ready(function(){
		$('#login-form').submit(function(e){
			var alert = $('#form-alert');
			var url = $(this).attr('action');
			var data = $(this).serializeArray();
			var button = $(this).find($('[type=submit]'));
			$('#session-alert').addClass('hide');
			alert.slideUp(100).html('');
			button.html('LOADING...').attr('disabled','disabled');
			$.post(url, data, function(data){
				var res = JSON.parse(data);
				if (res.result === 'success') {
					setTimeout(function(){
						window.location = 'welcome.php';
					}, 1000);
				} else {
					button.html('LOGIN').removeAttr('disabled');
					alert.slideDown(100);
					var li = [];
					$.each(res.message, function(key, val){
						li += '<li>' + val + '</li>';
					});
					alert.append('<p>Error(s): </p><ul>' + li + '</ul>');
				}
			});
			e.preventDefault();
		});

		$('#register-form').submit(function(e){
			var alert = $('#form-alert');
			var url = $(this).attr('action');
			var data = $(this).serializeArray();
			var button = $(this).find($('[type=submit]'));
			var input = $(this).find($('input'));
			alert.slideUp(100).html('');
			button.html('LOADING...').attr('disabled','disabled');
			$.post(url, data, function(data){
				var res = JSON.parse(data);
				if (res.result === 'success') {
					input.val('');
					button.html('LOGIN').removeAttr('disabled');
					alert.slideDown(100).removeClass('bg-red').addClass('bg-teal').html(res.message);
				} else {
					button.html('LOGIN').removeAttr('disabled');
					alert.slideDown(100).removeClass('bg-teal').addClass('bg-red').html(res.message);
					var li = [];
					$.each(res.message, function(key, val){
						li += '<li>' + val + '</li>';
					});
					alert.append('<p>Error(s): </p><ul>' + li + '</ul>');
				}
			});
			e.preventDefault();
		});

	});

</script>