<?php include 'add_badge.php'?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="preview.css" />
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
	<script>
		function preLoad() {
		a1 = new Image(); 
		a1.src = '<?=$saveBadgeLoc1?>';  
		a2 = new Image(); 
		a2.src = '<?=$saveBadgeLoc2?>';
		a3 = new Image(); 
		a3.src = '<?=$saveBadgeLoc3?>';
		a4 = new Image(); 
		a4.src = '<?=$saveBadgeLoc4?>';  
		a5 = new Image(); 
		a5.src = '<?=$saveBadgeLoc5?>';

		}
		function im(image) {
		document.getElementById(image[0]).src = eval(image + ".src");
		}
	</script>
    </head>
    <body onLoad="preLoad()">
    <div class="container" style="background-color: #004b84;" id="page">
			<a href="" style="color: white; font-weight: 600;">Back</a>
			<div class="userdp" style="padding: 15%; padding-bottom: 0%;">
				<div class="row" align='center'>
					<img src="<?=$_SESSION['img1']?>" class="img-responsive" id="a" style="top: 0; left: 25%; z-index: 0;"/>
				</div>
			</div>
            
			<h6 style="color: white; font-weight: 600; font-size: 14px">Preview Other Badges</h6>
			<div class="container-fluid" style="text-align: center; background-color: white">
				<form action="download.php" method='post'>
					<div class="row" align="center">
            			<div class="col-xs-4">
							<label>
							<input type="radio" name="1" value="preview1" onClick="im('a1');" required>
								<img
								class="img-responsive"
								src="<?=$_SESSION['img1']?>"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
            			</div>
						<div class="col-xs-4">
							<label>
							<input type="radio" name="1" value="preview2" onClick="im('a2');">
								<img
								src="<?=$_SESSION['img2']?>"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
						<div class="col-xs-4">
							<label>
							<input type="radio" name="1" value="preview3" onClick="im('a3');">
								<img
								src="<?=$_SESSION['img3']?>"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
					</div>
					<div class="row" align="center">
						<div class="col-xs-4">
							<label>
								<input type="radio" name="1" value="preview4" onClick="im('a4');">
								<img
								src="<?=$_SESSION['img4']?>"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>	
							</label>
						</div>
						<div class="col-xs-4">
							<label>
								<input type="radio" name="1" value="preview5" onClick="im('a5');">
								<img
								src="<?=$_SESSION['img5']?>"
								alt=""
								style="max-width: 80%; margin: 10px"
								/>
							</label>
						</div>
					</div>
				</div>
				<div class="download" align="center">
					<input type="text" value=<?=$saveBadgeLoc1?> name="imgurl1" hidden>
					<input type="text" value=<?=$saveBadgeLoc2?> name="imgurl2" hidden>
					<input type="text" value=<?=$saveBadgeLoc3?> name="imgurl3" hidden>
					<input type="text" value=<?=$saveBadgeLoc4?> name="imgurl4" hidden>
					<input type="text" value=<?=$saveBadgeLoc5?> name="imgurl5" hidden>
					<input type="submit" role="button" id="download" value='Download' style=" border-radius: 5px; border: none; color: #004b84; font-weight: 600; margin: 5%; min-width: 80%">
				</div>
			</form>
			<?php include 'download.php'?>
		</div>
    </body>
</html>