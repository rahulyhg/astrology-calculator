<?php

/* @var $this yii\web\View */

$this->title = 'Count Down Timer' ;

$this->registerCss("
	.count-down-container{
		margin:30px 0;
		background-color:#f8f5f0;
		padding:50px 0px;
	}
	
	.input-field{
		padding: 10px 2px 10px 12px;
		width: 80px;
		margin-left: 5px;
		margin-right: 5px;
		font-size: 15px;
		text-align: center;	
	}
	
	.col-separator{ font-size: 25px; font-weight: bolder;}
	
	.count-down-container #setTimer, .count-down-container .btn-timer{
		font-size: 16px;
		padding: 12px 20px;
		height: auto;
		line-height: inherit;
		border-radius: 0;
	}
	
	.btn-timer{ margin-right:12px; }
	
	.timer-display-container, .timer-display-container-inputs{margin: 0 auto; margin-bottom: 20px; float: none; clear: both;  padding: 0px !important;}
	
	.timer-display-container{ border: 4px solid #eaeaea; }
	
	.timer-display{ font-size: 40px; padding: 15px; width: 33.33% !important; float: left; border-right: 1px solid #eaeaea;}
	
	.timer-display-container-inputs .timer-display{
		padding: 15px 10px !important; border:0px !important;
	}
	
	.error{border:1px solid red !important;} 
	
	#timerMilSecDisplay{font-size: 13px; position: fixed; z-index: 9999999; margin-top: -25px; margin-left: 65px;}
	
	.timer-label{ font-weight: normal; font-size: 15px;}
	
	.mb20{ margin-bottom:20px; }
	
	@media screen and (max-width: 768px) {
		.calculator{ padding:30px 0px; }
	}
	
	@media screen and (min-width: 769px) and (max-width: 992px) {
		.calculator{ padding:40px 0px; }
	}
	
	@media screen and (min-width: 993px) and (max-width: 1200px) {
		.calculator{ padding:40px 0px; }
	}
	
	.clearfix{float:none; clear:both;}
");
?>
<div class="site-index">
	<div class="body-content">
		<div class="text-center">
			<h2><?=$this->title?></h2>
		</div>
		<div class="count-down-container text-center">
			<div class="count-down-set">
				<form onsubmit="return false;">
					<div class="col-md-4 col-sm-6 col-xs-10 timer-display-container-inputs" >
						<div class="timer-display">
							<input type="number" class="input-field" id="timerHour" placeholder="HH" min="0" max="99">
							<div class="timer-label">Hours</div>
						</div>
						<div class="timer-display">
							<input type="number" class="input-field" id="timerMin" placeholder="MM" min="0" max="59">
							<div class="timer-label">Minutes</div>
						</div>
						<div class="timer-display">
							<input type="number" class="input-field" id="timerSec" placeholder="SS" min="0" max="59">
							<div class="timer-label">Seconds</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</form>
				<a id="setTimer" class="btn btn-primary">Set Timer</a>
			</div>
			<div class="count-down-start hidden">
				<div class="col-md-4 col-sm-6 col-xs-10 timer-display-container" >
					<div class="timer-display">
						<div id="timerHourDisplay" class=""></div>
						<div class="timer-label">Hours</div>
					</div>
					<div class="timer-display">
						<div id="timerMinDisplay" class=""></div>
						<div class="timer-label">Minutes</div>
					</div>
					<div class="timer-display">
						<div id="timerSecDisplay" class=""></div>
						<div id="timerMilSecDisplay" class=""></div>
						<div class="timer-label">Seconds</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<a id="startTimer" class="btn btn-primary btn-timer">Start</a>
				<a id="pauseTimer" class="btn btn-primary btn-timer hidden">Pause</a>
				<a id="clearTimer" class="btn btn-primary btn-timer">Reset</a>
				<a id="resetTimer" class="btn btn-primary btn-timer">Back</a>
			</div>
		</div>
    </div>
</div>

<?php 
$this->registerJs('
	$(document).ready(function(){
		var timer={
			hOrg:null,mOrg:null,sOrg:null,h:null,m:null,s:null,ms:null,intervalObj:null,intervalObj2:null,
			init:function(){
				$("#setTimer").on("click",function(){
					timer.setTimer();
				});	
				
				$("#startTimer").on("click",function(){
					$("#startTimer").addClass("hidden");
					$("#startTimer").html("Continue");
					$("#pauseTimer").removeClass("hidden");
					timer.startTimer();
				});	
				
				$("#pauseTimer").on("click",function(){
					$("#pauseTimer").addClass("hidden");
					$("#startTimer").removeClass("hidden");
					timer.pauseTimer();
				});	
				
				$("#clearTimer").on("click",function(){
					timer.clearTimer();
				});	
				
				$("#resetTimer").on("click",function(){
					timer.resetTimer();
				});	
			},
			allValuesValid:function(){
				var h=$("#timerHour").val();
				var m=$("#timerMin").val();
				var s=$("#timerSec").val();	
				
				if(s===""){
					$("#timerSec").addClass("error");
					return false; 
				}
				s=s*1;
				if(isNaN(s)){
					$("#timerSec").addClass("error");
					return false; 
				}
				else if(s<0 || s>59){
					$("#timerSec").addClass("error");
					return false; 
				}
				else{
					$("#timerSec").removeClass("error");
				}
				
				m=m*1;
				if(isNaN(m)){
					$("#timerMin").addClass("error");
					return false; 
				}
				else if(m<0 || m>59){
					$("#timerMin").addClass("error");
					return false; 
				}
				else{
					$("#timerMin").removeClass("error");
				}
				
				h=h*1;
				if(isNaN(h)){
					$("#timerHour").addClass("error");
					return false; 
				}
				else if(h<0 || h>99){
					$("#timerHour").addClass("error");
					return false; 
				}
				else{
					$("#timerHour").removeClass("error");
				}
				
				if(s==""&&m==""&&h==""){
					$("#timerSec").addClass("error");
					return false;
				}
				
				return true;
			},
			setTimer:function(){
				if(!timer.allValuesValid()){
					return false;
				}
				
				timer.hOrg = timer.h = $("#timerHour").val();
				timer.mOrg = timer.m = $("#timerMin").val();
				timer.sOrg = timer.s = $("#timerSec").val();
				timer.ms = 1000;
				
				timer.h=timer.h*1; 
				timer.m=timer.m*1;
				timer.s=timer.s*1;
				
				timer.displayHMS();
				
				$(".count-down-set").addClass("hidden");
				$(".count-down-start").removeClass("hidden");
			},
			startTimer:function(){
				timer.intervalObj=setInterval(function(){ 
					
					//if(timer.ms>0){
					//	timer.ms=timer.ms-1;	
					//}	
					//else if(timer.ms==0 || timer.ms==-1){
						//timer.ms=999;	
						if(timer.s>0){
							timer.s=timer.s-1;	
						}
						else if(timer.s==0){
							if(timer.m>0){
								timer.m=timer.m-1;	
								timer.s=59;	
							}
							else if(timer.m==0){
								if(timer.h>0){
									timer.h=timer.h-1;	
									timer.m=59;	
									timer.s=59;	
								}
								else if(timer.h==0){
									timer.pauseTimer();	
								}
								else{
									timer.pauseTimer();
								}	
							}
							else{
								timer.pauseTimer();
							}
						}
						else{
							timer.pauseTimer();
						}
					//}
					//else{
					//	timer.pauseTimer();
					//}
					timer.displayHMS();
				}, 1000 );
				/*
				timer.intervalObj2=setInterval(function(){ 
					timer.displayHMS();
				},100);
				*/
				
			},
			pauseTimer:function(){
				clearInterval(timer.intervalObj);
				$("#pauseTimer").addClass("hidden");
				//clearInterval(timer.intervalObj2);
			}, 
			displayHMS:function(){
				$("#timerHourDisplay").html(timer.h);
				$("#timerMinDisplay").html(timer.m);
				$("#timerSecDisplay").html(timer.s);	
				//$("#timerMilSecDisplay").html(timer.ms);	
			},
			clearTimer:function(){
				$("#startTimer").html("Start");
				$("#startTimer").removeClass("hidden");
				$("#pauseTimer").addClass("hidden");
				
				timer.pauseTimer();
				timer.h=timer.hOrg; 
				timer.m=timer.mOrg;
				timer.s=timer.sOrg;
				timer.displayHMS();
			},
			resetTimer:function(){
				$("#startTimer").html("Start");
				$("#startTimer").removeClass("hidden");
				$("#pauseTimer").addClass("hidden");
				
				timer.pauseTimer();
				timer.h=timer.hOrg=null; 
				timer.m=timer.mOrg=null;
				timer.s=timer.sOrg=null;
				timer.displayHMS();
				
				$("#timerHour").val("");
				$("#timerMin").val("");
				$("#timerSec").val("");
				
				$(".count-down-start").addClass("hidden");
				$(".count-down-set").removeClass("hidden");
			}
		};
		timer.init();
	});
');
?>