<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name ;

$this->registerCss("
	.calculator{
		margin:30px 0;
		background-color:#f8f5f0;
		padding:50px 150px;
	}
	
	.mb10{margin-bottom:10px;}
	
	.calculator #birth_date{
		font-size: 16px;
		padding: 17px 25px;
		height: auto;
		line-height: inherit;
		border-radius: 0;
	}
	
	#birth_date_button{
		font-size: 20px;
		border-radius: 0;
		padding: 13px 30px 14px;
	}
	
	#birth_date_button:hover{
		font-size: 20px;
		border-radius: 0;
		padding: 13px 30px 14px;
	}
	
	.calculator-result {font-size:16px;}
	
	@media screen and (max-width: 768px) {
		.calculator{ padding:30px 10px;}
		.calculator #birth_date{
			font-size: 13px;
			padding: 15px 20px 13px;
			height: auto;
			line-height: inherit;
			border-radius: 0;
		}
		
		#birth_date_button, #birth_date_button:hover{
			font-size: 15px;
			border-radius: 0;
			padding: 12px 25px;
		}
	}
	
	@media screen and (min-width: 769px) and (max-width: 992px) {
		.calculator{ padding:40px 50px;}
	}
	
	@media screen and (min-width: 993px) and (max-width: 1200px) {
		.calculator{ padding:40px 70px;}
	}
	
");
?>
<div class="site-index">
	<div class="body-content">
		<div class="text-center">
			<h2>Astrological Birth Sign Calculator</h2>
		</div>
	
		<div class="calculator">
			<form>
				<div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<div>
						<?= yii\jui\DatePicker::widget([
								'name' => 'birth_date',
								'dateFormat' => 'yyyy-MM-dd',
								'options' => [
									'id' => 'birth_date',
									'class' => 'form-control' ,
									'placeholder' => 'Select Birth Date (yyyy-mm-dd)' 
								],
								'clientOptions' => [
									'defaultDate' => '', 
									'changeMonth' => true,
									'changeYear' => true,	
								] 
							])?>
					</div>
				</div>
				<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<input type="button" id="birth_date_button" class="btn btn-primary" value="Calculate" />
				</div>
				<div class="clearfix"></div>
			</form>
			<div class="calculator-result col-md-12">
				<div class="mb10"><b>Sun Sign:</b> <span id="sunsign"></span></div>
				<div class=""><b>Chinese  Sign:</b> <span id="chinesesign"></span></div>
			</div>
			<div class="clearfix"></div>
		</div>
		
        <div class="row">
            <div class="col-lg-12">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-12">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div>
        </div>

    </div>
</div>

<?php 
$this->registerJs('
	$(document).ready(function(){
		$("#birth_date_button").on("click",function(){
			var birthDate=$("#birth_date").val();
			birthDateAry=birthDate.split("-");
			var birthyear = birthDateAry[0] * 1 ;
			var	month = birthDateAry[1] * 1 ;
			var	date = birthDateAry[2] * 1 ;
			var start = 1901;
			var value = "" ;
			
			<!-- This script and many more are available free online at -->
			<!-- The JavaScript Source!! http://javascript.internet.com -->
			<!-- Original:  Timothy Joko-Veltman (restlessperegrine@yahoo.com ) -->
			<!-- Begin 
			if (month == 1 && date >=20 || month == 2 && date <=18) {value = "Aquarius";}
			if (month == 1 && date > 31) {value = "Huh?";}
			if (month == 2 && date >=19 || month == 3 && date <=20) {value = "Pisces";}
			if (month == 2 && date > 29) {value = "Say what?";}
			if (month == 3 && date >=21 || month == 4 && date <=19) {value = "Aries";}
			if (month == 3 && date > 31) {value = "OK.  Whatever.";}
			if (month == 4 && date >=20 || month == 5 && date <=20) {value = "Taurus";}
			if (month == 4 && date > 30) {value = "I\'m soooo sorry!";}
			if (month == 5 && date >=21 || month == 6 && date <=21) {value = "Gemini";}
			if (month == 5 && date > 31) {value = "Umm ... no.";}
			if (month == 6 && date >=22 || month == 7 && date <=22) {value = "Cancer";}
			if (month == 6 && date > 30) {value = "Sorry.";}
			if (month == 7 && date >=23 || month == 8 && date <=22) {value = "Leo";}
			if (month == 7 && date > 31) {value = "Excuse me?";}
			if (month == 8 && date >=23 || month == 9 && date <=22) {value = "Virgo";}
			if (month == 8 && date > 31) {value = "Yeah. Right.";}
			if (month == 9 && date >=23 || month == 10 && date <=22) {value = "Libra";}
			if (month == 9 && date > 30) {value = "Try Again.";}
			if (month == 10 && date >=23 || month == 11 && date <=21) {
				value = "Scorpio";}
			if (month == 10 && date > 31) {value = "Forget it!";}
			if (month == 11 && date >=22 || month == 12 && date <=21) {value = "Sagittarius";}
			if (month == 11 && date > 30) {value = "Invalid Date";}
			if (month == 12 && date >=22 || month == 1 && date <=19) {value = "Capricorn";}
			if (month == 12 && date > 31) {value = "No way!";}
			$("#sunsign").html(value);
			
			x = (start - birthyear) % 12;
			if (x == 1 || x == -11) {value = "Rat";}
			if (x == 0) {value = "Ox";}
			if (x == 11 || x == -1) {value = "Tiger";}
			if (x == 10 || x == -2) {value = "Rabbit/Cat";}
			if (x == 9 || x == -3)  {value = "Dragon";}
			if (x == 8 || x == -4)  {value ="Snake";}
			if (x == 7 || x == -5)  {value = "Horse";}
			if (x == 6 || x == -6)  {value = "Sheep";}
			if (x == 5 || x == -7)  {value = "Monkey";}
			if (x == 4 || x == -8)  {value = "Cock/Phoenix";}
			if (x == 3 || x == -9)  {value = "Dog";}
			if (x == 2 || x == -10)  {value = "Boar";}  
			
			$("#chinesesign").html(value);
			//  End -->	
		});
	});

');
?>