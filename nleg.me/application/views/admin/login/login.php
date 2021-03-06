<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>登录</title>
	<link rel="stylesheet" href="/resources/admin/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/resources/admin/assets/css/custom.css">

	<script src="/resources/admin/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page">

	
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-6">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// 显示登陆表单
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// 验证和ajax提交
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: '请输入您的用户名'
								},
								
								passwd: {
									required: '请输入您的密码'
								}
							},
							
							// 通过ajax进行表单处理
							submitHandler: function(form)
							{
								show_loading_bar(70); // 填充进度条到 70% (只要一个给出的值)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									url: "data/login-check.php",
									method: 'POST',
									dataType: 'json',
									data: {
										do_login: true,
										username: $(form).find('#username').val(),
										passwd: $(form).find('#passwd').val(),
									},
									success: function(resp)
									{
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												
												// 登陆成功后页面重定向 (当进度条到达 100%)
												if(resp.accessGranted)
												{
													window.location.href = 'dashboard-1.html';
												}
												else
												{
													toastr.error("密码错误, 请再尝试. 用户名和密码是 <strong>demo/demo</strong> :)", "登录不合法!", opts);
													$passwd.select();
												}
											}
										});
										
									}
								});
								
							}
						});
						
						// 设置表单焦点
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- 错误容器 -->
				<div class="errors-container">
				
									
				</div>
				
				<!-- 添加类 "fade-in-effect" 影响登录表单 -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="/resources/admin/assets/images/logo@2x.png" alt="" width="80" />
							<span>登 录</span>
						</a>
						
						<p>亲爱的用户, 请登录访问管理页面!</p>
					</div>
	
					
					<div class="form-group">
						<label class="control-label" for="username">用户名</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">密码</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left">
							<i class="fa-lock"></i>
							登 录
						</button>
					</div>
					
					<div class="login-footer">
						<a href="#">忘记密码?</a>
						
						<div class="info-links">
							<a href="#">ToS</a> -
							<a href="#">隐私政策</a>
						</div>
						
					</div>
					
				</form>
				
				<!-- 其他登录 -->
				<div class="external-login">
					<a href="#" class="facebook">
						<i class="fa-facebook"></i>
						Facebook 登录
					</a>
					
					<!-- 
					<a href="#" class="twitter">
						<i class="fa-twitter"></i>
						Login with Twitter
					</a>
					
					<a href="#" class="gplus">
						<i class="fa-google-plus"></i>
						Login with Google Plus
					</a>
					 -->
				</div>
				
			</div>
			
		</div>
		
	</div>



	<!-- Bottom Scripts -->
	<script src="/resources/admin/assets/js/bootstrap.min.js"></script>
	<script src="/resources/admin/assets/js/TweenMax.min.js"></script>
	<script src="/resources/admin/assets/js/resizeable.js"></script>
	<script src="/resources/admin/assets/js/joinable.js"></script>
	<script src="/resources/admin/assets/js/xenon-api.js"></script>
	<script src="/resources/admin/assets/js/xenon-toggles.js"></script>
	<script src="/resources/admin/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="/resources/admin/assets/js/toastr/toastr.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/resources/admin/assets/js/xenon-custom.js"></script>

</body>
</html>