<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $loginheader ?>
		<form class="form-signin" id="restoreForm" action="#" method="POST">
			<h2 class="form-signin-heading">Восставновление</h2>
			<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
			<div class="form-control captcha">
				<img src="/main/captcha">
			</div>
			<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Проверочный код">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Восстановить</button>
		</form>
		<script>
			$('#restoreForm').ajaxForm({ 
				url: '/account/restore/ajax',
				dataType: 'text',
				success: function(data) {
					console.log(data);
					data = $.parseJSON(data);
					switch(data.status) {
						case 'error':
							showError(data.error);
							reloadImage('#captchaimage');
							$('button[type=submit]').prop('disabled', false);
							break;
						case 'success':
							showSuccess(data.success);
							break;
					}
				},
				beforeSubmit: function(arr, $form, options) {
					$('button[type=submit]').prop('disabled', true);
				}
			});
			$('.captcha img').click(function() {
				reloadImage(this);
			});
		</script>
<?php echo $loginfooter ?>
