<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.form-container{
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 100vh;
		}
		form{
			border : 0.5px solid #ecf0f1;
			padding: 15px;
			width: 60%;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		form > div{
			width: 100%;
		}
		.pro-name-input-style{
			height: 35px;
			border-radius: 5px;
			width: 95%;
			border : 1px solid #bdc3c7;
			padding: 5px 10px;
		}
		.common-style:focus{
			outline: none;
			box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.4);
			border : 1px solid #3498db;
		}
		textarea{
			width: 90%;
			border : 1px solid #bdc3c7;
			padding: 0px 10px;
			height: 100px;
			border-radius: 5px;
			margin: 10px 0px;
		}
		textarea:focus{
			outline: none;
			box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.4);
			border : 1px solid #3498db;
		}
		.choose-thumbnail-container{
			position: relative;
			height: 60px;
			display: flex;
			justify-content: flex-start;
			align-items: center;
			width: 100%;
		}
		.wrap-choose-option{
			position: absolute;
			width: 270px;
			height: 35px;
			border-radius: 5px;
			background: ;
			display: flex;
			justify-content: space-between;
			padding: 0px 5px;
			font-size: 16px;
			align-items: center;
			left: 0px;
			top : 50%;
			border : 1px solid #bdc3c7;
			transform: translate(0%,-50%);
		}
		..wrap-choose-option span:nth-child(1){
			width: 50%;
			background: white;
			color : black;

		}
		.wrap-choose-option:hover{
			color: black;
			box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.4);
		}
		.wrap-choose-option span{
			height: 100%;
			display: flex;
			align-items: center;
		}
		.choose-input{
			margin-left: 50px;
		}
		#left{
			width: 50%;
			background: white;
		}
	</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".wrap-choose-option").click(function(){
				document.getElementsByClassName('choose-input')[0].click();
			});
		});
	</script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<div class="form-container">
		<form action="" method="" enctype="multipart/form-data">
			<div class="pro-name-container">
				<input class="pro-name-input-style common-style" type="text" name="" placeholder="Product Name">
			</div>
			<div class="type-brand-container">
				<select>
					<option>Packaged</option>
					<option>Loose</option>
				</select>
				<input type="text" name="">
			</div>
			<div>
				<textarea row="5" column="200">
					
				</textarea>
			</div>
			<div class="choose-thumbnail-container">
				<input class="choose-input" type="file" name="proThumbnail">
				<label class="wrap-choose-option"><span id="left">Choose Thumbnail</span><span> &nbsp;<i class="fa fa-angle-right"></i></span></label>
				<label id="choosed-file"></label>
			</div>
			<div>
				<input type="submit" name="">
			</div>
		</form>
	</div>

</body>
</html>
<?php 
	
	mkdir("ishwarBaisla");
?>