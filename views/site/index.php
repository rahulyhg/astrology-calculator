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
	
	.day-select,.month-select,.year-select{
		font-size: 16px;
		padding: 18px 15px 17px;
		height: auto;
		line-height: inherit;
		border-radius: 0;
		display:inline-block;
		margin-right:15px;
	}
	
	.day-select{width:100px;}
	.month-select{width:140px;}
	.year-select{width:115px;}
	
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
		
		.day-select,.month-select,.year-select{
			font-size: 14px;
			padding: 14px 9px;
			height: auto;
			line-height: inherit;
			border-radius: 0;
			display:inline-block;
			margin-right:5px;
			margin-bottom:5px;
		}
		
		.day-select{width:80px;}
		.month-select{width:120px;}
		.year-select{width:100px;}
	
		#birth_date_button, #birth_date_button:hover{
			font-size: 15px;
			border-radius: 0;
			padding: 12px 25px;
		}
	}
	
	@media screen and (min-width: 769px) and (max-width: 992px) {
		.calculator{ padding:40px 30px;}
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
				<div class="form-group col-lg-7 col-md-7 col-sm-8 col-xs-12">
					<div>
						<select class="form-control day-select" id="day-select">
							<option value="">Day</option>
							<?php
							for($d=0;$d<=31;$d++){
								echo '<option value="'.$d.'">'.$d.'</option>';
							}
							?>
						</select>
						<select class="form-control month-select" id="month-select">
							<option value="">Month</option>
							<?php
							$months=[1=>'January',2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December'] ;
							for($m=1;$m<=12;$m++){
								echo '<option value="'.$m.'">'.$months[$m].'</option>';
							}
							?>
						</select>
						<select class="form-control year-select" id="year-select">
							<option value="">Year</option>
							<?php
							for($y=date('Y');$y>=1800;$y--){
								echo '<option value="'.$y.'">'.$y.'</option>';
							}
							?>
						</select>
						<?php
						/*
						echo yii\jui\DatePicker::widget([
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
							])
						*/
						?>
					</div>
				</div>
				<div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-12">
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
	function isValidDate(day,month,year){
		if( isNaN(day) || isNaN(month) || isNaN(year) ){
			return false;
		}
		
		if( year < 1800 || year > 9999 ){
			return false;
		}
		
		var numOfDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
		if(month==2){
			var lyear = false;  
			if( (!(year % 4) && year % 100) || !(year % 400) ){  
				lyear = true;  
			}  
			if( (lyear==false) && (day>=29) ){  
				return false;  
		    }  
		    if( (lyear==true) && (day>29) ){  
				return false;  
			}  
		}
		else if(month>0||month<=12){  
			if (day>numOfDays[month-1]){  
				return false;  
			}  
		}
		else{
			return false;
		}
		return true;	
	}
	$(document).ready(function(){
		$("#birth_date_button").on("click",function(){
			//var birthDate=$("#birth_date").val();
			//birthDateAry=birthDate.split("-");
			//var birthYear = birthDateAry[0] * 1 ;
			//var	birthMonth = birthDateAry[1] * 1 ;
			//var	birthDay  = birthDateAry[2] * 1 ;
			
			var birthYear= $("#year-select").val() * 1;
			var	birthMonth= $("#month-select").val() * 1;
			var	birthDay= $("#day-select").val() * 1;
			
			var sunsign = ":(" ;
			var chinesesign=":(";

			if(isValidDate(birthDay,birthMonth,birthYear)){
				var startYear = 1901;
				if( (birthMonth == 1 && birthDay >=20) || (birthMonth == 2 && birthDay <=18) ){sunsign="Aquarius";}
				if( (birthMonth == 2 && birthDay >=19) || (birthMonth == 3 && birthDay <=20) ){sunsign="Pisces";}
				if( (birthMonth == 3 && birthDay >=21) || (birthMonth == 4 && birthDay <=19) ){sunsign="Aries";}
				if( (birthMonth == 4 && birthDay >=20) || (birthMonth == 5 && birthDay <=20) ){sunsign="Taurus";}
				if( (birthMonth == 5 && birthDay >=21) || (birthMonth == 6 && birthDay <=21) ){sunsign="Gemini";}
				if( (birthMonth == 6 && birthDay >=22) || (birthMonth == 7 && birthDay <=22) ){sunsign="Cancer";}
				if( (birthMonth == 7 && birthDay >=23) || (birthMonth == 8 && birthDay <=22) ){sunsign="Leo";}
				if( (birthMonth == 8 && birthDay >=23) || (birthMonth == 9 && birthDay <=22) ){sunsign="Virgo";}
				if( (birthMonth == 9 && birthDay >=23) || (birthMonth == 10 && birthDay <=22) ){sunsign="Libra";}
				if( (birthMonth == 10 && birthDay >=23) || (birthMonth == 11 && birthDay <=21) ){sunsign="Scorpio";}
				if( (birthMonth == 11 && birthDay >=22) || (birthMonth == 12 && birthDay <=21) ){sunsign="Sagittarius";}
				if( (birthMonth == 12 && birthDay >=22) || (birthMonth == 1 && birthDay <=19) ){sunsign="Capricorn";}
			
				var cm=(startYear-birthYear)%12;
				if(cm == 1 || cm == -11){chinesesign = "Rat";}
				if(cm == 0){chinesesign = "Ox";}
				if(cm == 11 || cm == -1){chinesesign = "Tiger";}
				if(cm == 10 || cm == -2){chinesesign = "Rabbit/Cat";}
				if(cm == 9 || cm == -3){chinesesign = "Dragon";}
				if(cm == 8 || cm == -4){chinesesign ="Snake";}
				if(cm == 7 || cm == -5){chinesesign = "Horse";}
				if(cm == 6 || cm == -6){chinesesign = "Sheep";}
				if(cm == 5 || cm == -7){chinesesign = "Monkey";}
				if(cm == 4 || cm == -8){chinesesign = "Cock/Phoenix";}
				if(cm == 3 || cm == -9){chinesesign = "Dog";}
				if(cm == 2 || cm == -10){chinesesign = "Boar";}  
			}
			else{
					
			}
			
			$("#sunsign").html(sunsign);
			$("#chinesesign").html(chinesesign);
		});
	});

');
?>