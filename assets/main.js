$(document).ready(function(){
	// Validation for login form
	$("#login_form").validate({
	  rules: {
	    username: "required",
	    password: {
	      required: true,
	    }
	  },
	  messages: {
	    username: "Please specify your name",
	    password: {
	      required: "Cannot login without your password",
	    }
	  }
	});

	// Add name to the file upload filed
	$("#product .custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	// Validation for product form
	$('#form-submit').on('click',function(e) {
		// e.preventDefault();
		$("#product").validate({
			rules: {
				product_name: "required",
				sku_number:   "required",
				part_number:  "required",
				description:  "required",
				specification:"required",
				upload_image: {
					required: true,
					accept:"jpg,png,jpeg,gif" 
				}
			},

			messages: {
				product_name: "Please specify product name",
				sku_number: "Please specify Sku Number",
				part_number: "Please specify Part number",
				description: "Description is required",
				specification: "Specification required",
				upload_image: {
					    required: "Select Image",
	                    accept: "Only image type jpg/png/jpeg/gif is allowed"
				}
			}

		});
	});

});