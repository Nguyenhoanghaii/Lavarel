@extends('bread.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

			<form action="{{route('user.create')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="fullname" required oninput="validateInput(this)">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name="address" required oninput="addressInput(this)">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required oninput="phoneInput(this)">
						</div>
						<div class="form-block">
							<label for="pass">Password*</label>
							<input type="password" id="password" name="password" required pattern=".{8,}">
						</div>
						<div class="form-block">
							<label for="pass">Re-password*</label>
							<input type="password" id="repassword" name="password" required pattern=".{8,}">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection
	<!--customjs-->
	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });


</script>
<script>
	function validateInput(inputField) {
  // Loại bỏ tất cả các ký tự không phải chữ cái
  inputField.value = inputField.value.replace(/[^a-zA-Z\s\u00C0-\u00FF]/g, '');
	}
	function addressInput(inputField) {
  // Loại bỏ tất cả ký tự KHÔNG phải chữ cái, số và khoảng trắng
  inputField.value = inputField.value.replace(/[^a-zA-Z0-9\s]/g, '');
}
	function phoneInput(inputField) {
  // Loại bỏ tất cả ký tự không phải số
  inputField.value = inputField.value.replace(/[^0-9]/g, '');
}
	 jQuery(document).ready(function($) {
                'use strict';

// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
</body>
</html>
