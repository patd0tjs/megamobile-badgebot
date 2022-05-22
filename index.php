
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
		<link rel="stylesheet" href="badgebot.css" />
		<style>	
		[type="radio"] {
			position: absolute;
			opacity: 0;
			width: 0;
			height: 0;
		}
		[type="radio"] + img {
			cursor: pointer;
		}	
		[type="radio"]:checked + img{
			outline: 3px solid #004b84;
		}
		</style>
	</head>
	<body>
		<div class="container" style="background-color: #004b84;" >
			<a href="" style="color: white; font-weight: 600;">Back</a>
			<div class="userdp" style="padding: 15%; padding-bottom: 0%;">
				<div class="row" align='center'>
					<img src="./assets/user.png" id="uploaded_image" class="img-responsive" style="top: 0; left: 30%; z-index: 0;"/>
				</div>
				<div class="row" style="padding-top: 10px;" align='center'>
					<form method="post">
						<input type="file" role="button" accept='image/*' name="image" class="image" id="upload_image" required>
					</form>	
				</div>
			</div>
			<h6 style="color: white; font-weight: 600; font-size: 14px">Select Badge</h6>
			<div class="container-fluid" style="text-align: center; background-color: white">
					<div class="row" align="center">
            			<div class="col-xs-4">
							<label>
							<!-- <input type="radio" name="badge_option" id="badge_option" value="badge1" checked required> -->
								<img
								class="img-responsive"
								src="./assets/preview1.png"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
            			</div>
						<div class="col-xs-4">
							<label>
							<!-- <input type="radio" name="badge_option" id="badge_option" value="badge2" required> -->
								<img
								src="./assets/preview2.png"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
						<div class="col-xs-4">
							<label>
							<!-- <input type="radio" name="badge_option" id="badge_option" value="badge3" required> -->
								<img
								src="./assets/preview3.png"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
					</div>
					<div class="row" align="center">
						<div class="col-xs-4">
							<label>
								<!-- <input type="radio" name="badge_option" id="badge_option" value="badge4" required> -->
								<img
								src="./assets/preview4.png"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>	
							</label>
						</div>
						<div class="col-xs-4">
							<label>
								<!-- <input type="radio" name="badge_option" id="badge_option" value="badge5" required> -->
								<img
								src="./assets/preview5.png"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
					</div>
				</div>
				<div class="generate" align="center">
					<input type="submit" role="button" id="download" value='Download' style=" border-radius: 5px; border: none; color: #004b84; font-weight: 600; margin: 5%; min-width: 80%" disabled>
				</div>
				
		</div>
					<!-- modal for cropper -->
					<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header" align='center'>						
							<button type="submit" id="crop" class="btn btn-primary" value="Crop" style="min-width: 50%">Crop</button>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
						
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			                    <img src="" id="sample_image"/>
			        		</div>
			      		</div>
			    	</div>
			  	</div>
			</div>
	</body>
</html>

<script>

$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			// preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'crop.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						$('#uploaded_image').attr('src', data);
						window.location.href= "upload.php";
					}
				});
			};
		});
	});
	
});
</script>