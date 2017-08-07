<script type="text/javascript">
	$(document).ready(function(){
		$('#login-form').submit(function(e){
			var alert = $('#form-alert');
			var url = $(this).attr('action');
			var data = $(this).serializeArray();
			var button = $(this).find($('[type=submit]'));
			$('#session-alert').addClass('hide');
			alert.addClass('hide').html('');
			button.html('LOADING...').attr('disabled','disabled');
			$.post(url, data, function(data){
				var res = JSON.parse(data);
				if (res.result === 'success') {
					setTimeout(function(){
						window.location = 'welcome.php';
					}, 1000);
				} else {
					button.html('LOGIN').removeAttr('disabled');
					alert.removeClass('hide');
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
			alert.addClass('hide').html('');
			button.html('LOADING...').attr('disabled','disabled');
			$.post(url, data, function(data){
				var res = JSON.parse(data);
				if (res.result === 'success') {
					input.val('');
					button.html('LOGIN').removeAttr('disabled');
					alert.removeClass('bg-red hide').addClass('bg-teal').html(res.message);
				} else {
					button.html('LOGIN').removeAttr('disabled');
					alert.removeClass('bg-teal hide').addClass('bg-red').html(res.message);
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