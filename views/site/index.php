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
                    <h2>Welcome to the Astrology Calculator</h2>

                    <p>Astrology Calculator allows you to quickly find out the zodiac and Chinese animal sign for anyone whose date of birth you know. Simply type in the birth date and year, and Astrology Calculator will give you instant feedback on the zodiac sign and Chinese animal sign for any person. This can help you see how compatible you may be with another person you know, or simply give you the knowledge to use in casual conversation. If you're interested in knowing your horoscope and Chinese astrology signs, this is an easy and effective way to find it out.</p>

                    <h2>Dates of Zodiac Signs</h2>

                    <p>There are a total of 12 different zodiac signs. As one might imagine each astrology sign has both strengths and weaknesses. Astrology believes by analyzing star images in the sky and the position of the planets, it's possible to understand a person's basic characteristics, fears, flaws, and preferences. By knowing a person's zodiac sign, we're able to better know people through the basic characteristics they have due to their zodiac signs. The 12 zodiac signs with the birth dates for each sign are as follows:</p>

                    <ul>
                        <li>The sign Aquarius is from January 21 to February 18.</li>
                        <li>The sign Pisces is from February 19 to March 20.</li>
                        <li>The sign Aries is from March 21 to April 19.</li>
                        <li>The sign Taurus is from April 20 to May 20.</li>
                        <li>The sign Gemini is from May 20 - April 19.</li>
                        <li>The sign Cancer is from June 21 - July 22.</li>
                        <li>The sign Leo is from July 23 - August 23.</li>
                        <li>The sign Virgo is from August 24 – September 22.</li>
                        <li>The sign Libra is from September 23 - October 22.</li>
                        <li>The sign Scorpio is fromOctober 24 - November 22.</li>
                        <li>The sign Sagittarius is from November 23 - December 21.</li>
                        <li>The sign Capricorn is from December 22 - January 20.</li>
                    </ul>

                    <p>Each of the above 12 horoscope signs can be divided into four different zodiac elements, each of which represents a specific energy which acts upon each person. Astrology attempts to focus on the postive energies to gain a better understanding of each individual and the positive and negative traits each person possesses. The four astrological elements are:</p>

                    <ul>
                        <li>Air: Aquarius, Gemini, Libra</li>
                        <li>Earth: Capricorn, Taurus, Virgo</li>
                        <li>Fire: Aries, Leo, Sagittarius</li>
                        <li>Water: Cancer, Pisces, Scorpio</li>
                    </ul>

                    <p>While the horoscope elements are found within all of us, certain elements are more dominant depending on the zodiac sign one falls under. Depending on the dominant element, it helps determine the unique personality traits including behavior, character, emotions, and thinking associated with each zodiac sign. The basics of each of the four signs are as follows:</p>

                    <p><b>Air Signs</b></p>

                    <p>Those who fall under the air element have a love of communication and relationships with others. They tend to be friendly and communicative while also being intellectual and analytical thinkers. They enjoy social gatherings, but not so much small-talk. They would much rather have a philosophical discussion. They are always interested n good books. They will freely give advice on a variety of topics, but can at times be superficial.</p>

                    <p><b>Earth Signs</b></p>

                    <p>People who fall under an earth element are often considered to be grounded, and help to bring others down to earth. They tend to be conservative in their lifestyle and look at the world in a realistic way. Despite this, they can also be quite emotional and they have desires for luxurious material goods. They tend to be practical when it comes to making decisions and stable and loyal to a fault when it comes to those who are part of their group.</p>

                    <p><b>Fire Signs</b></p>

                    <p>It's hard to miss those who fall under the fire element. They possess a lot of energetic emotion which can be seen in their passion, their temperament, and dynamic personality. It's common for them to get angry at the drop of a hat, but they also don't keep grudges -- and forgive others easily. They tend to love adventure and have a great amount of energy. Physically, they are strong, ready for action, and are often able to give inspiration to others. Those who fall under the fire element are often creative, intelligent, self-aware, and have a great deal of idealism.</p>

                    <p><b>Water Signs</b></p>

                    <p>If you know someone who is ultra sensitive and emotional, there is a good chance they fall under the water element. They tend to be highly intuitive, and many times they appear to be mysterious to those who don't know them well. They value intimacy, enjoy deep conversations and often have great memories. With all the deep emotion, they can over criticize themselves more than they should, but at the same time are always around to support their family and friends.</p>

                    <p><b>Zodiac Signs Compatibility</b></p>

                    <p>For those who are looking for love, astrology offers a compatibility love chart. There are no zodiac signs which are completely incompatible with another sign. That means there's the chance of love no matter which two astrological signs ends up together. That being said, those with highly compatible signs will get along much more easily than those with signs that are less compatible. Still, with patience and understanding, even those with less compatible signs can find wonderful love.</p>

                    <p>Those horoscope signs which fall under the same element are naturally compatible and can form the love relationships with ease. Since they fall under the same zodiac element, they naturally understand each other. Below you'll find a list of which zodiac signs are easiest for love:</p>

                    <p>Exceedingly compatible: Aries-Aries, Aries-Leo, Aries-Sagittarius, Taurus-Taurus, Taurus-Virgo, Taurus-Capricorn. Gemini-Gemini, Gemini-Libra, Gemini-Aquarius, Cancer-Cancer, Cancer-Scorpio, Cancer-Pisces, Leo-Leo, Leo-Sagittarius, Virgo-Virgo, Virgo-Capricorn, Libra-Libra, Libra-Aquarius, Scorpio-Scorpio, Scorpio-Pisces, Sagittarius-Sagittarius, Capricorn-Capricorn, Aquarius-Aquarius, Pisces-Pisces</p>

                    <p>Strongly compatible: Aries-Gemini, Aries-Aquarius, Taurus-Cancer, Taurus-Pisces, Gemini-Leo, Cancer-Virgo, Cancer-Capricorn, Leo-Libra, Virgo-Scorpio, Libra-Sagittarius, Scorpio-Capricorn, Sagittarius-Aquarius, Capricorn-Pisces</p>

                    <p>Highly compatible: Aries-Libra, Aries-Scorpio, Aries-Capricorn, Taurus-Leo, Taurus-Libra, Taurus-Scorpio, Gemini-Sagittarius, Cancer-Leo, Leo-Scorpio, Leo-Picses, Libra-Picese, Aquarius-Picses</p>

                    <p>Very compatible: Aries-Taurus, Aries-Cancer, Taurus-Aquarius, Gemini-Virgo, Gemini-Capricorn, Cancer-Sagittarius, Cancer-Aquarius, Leo-Capricorn, Leo-Aquarius, Virgo-Libra, Virgo-Aquarius, Virgo-Picses, Libra-Scorpio, Libra-Capricorn, Scorpio-Sagittarius, Scorpio, Aquarius, Sagittarius-Pisces, Capricorn-Aquarius</p>

                    <p>Compatible: Aries-Virgo, Aries-Pisces, Taurus-Gemini, Taurus-Sagittarius, Gemini-Cancer, Gemini-Scorpio, Gemini-Picses, Cancer-Libra, Leo-Virgo, Virgo-Sagittarius, Sagittarius-Capricorn</p>

                    <p>The study of astrological love is called Synastry. Since all signs are compatible, Synastry is best used as a tool so partners can better understand where the strengths and weaknesses may be found within the relationship. Knowing your partner's zodiac sign may help each of you better understand each other's strengths and weaknesses as show through astrology.</p>

                    <p>Chinese Astrology</p>

                    <p>Chinese astrology or the Chinese zodiac is different than the above zodiac signs. It's the most ancient horoscope system known in the world. The Chinese zodiac system uses twelve animals with each animal representing a birth year. In this system, the year (not the month and day) your were born determines your birth animal.</p>

                    <p>The animal years are important because it's believed that you have the attributes of your animal sign, and these attributes can both help and hinder a relationship depending on what other animal sign your partner may be. For those who believe the Chinese zodiac, the animal signs of two people is important to determine if they are compatible in love or any other relationship.</p>

                    <p>For every person, the Chinese zodiac comes back every 12 years. This means it will be your animal year when you're 12, 24, 36, 48, 60, 72, 84, 96 and 108. Below are the twelve Chinese zodiac animal signs and their corresponding years:</p>

                    <ul>
                        <li>Rat: 1900, 1912, 1924, 1936, 1948, 1960, 1972, 1984, 1996, 2008, 2020</li>
                        <li>Ox: 1901, 1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021</li>
                        <li>Tiger: 1902, 1914, 1926, 1938, 1950, 1962, 1974, 1986, 1998, 2010, 2022</li>
                        <li>Rabbit: 1903, 1915, 1927, 1939, 1951, 1963, 1975, 1987, 1999, 2011, 2023</li>
                        <li>Dragon: 1904, 1916, 1928, 1940, 1952, 1964, 1976, 1988, 2000, 2012, 2024</li>
                        <li>Snake: 1905, 1917, 1929, 1941, 1953, 1965, 1977, 1989, 2001, 2013, 2025</li>
                        <li>Horse: 1906, 1918, 1930, 1942, 1954, 1966, 1978, 1990, 2002, 2014, 2026</li>
                        <li>Sheep: 1907, 1919, 1931, 1943, 1955, 1967, 1979, 1991, 2003, 2015, 2027</li>
                        <li>Monkey: 1908, 1920, 1932, 1944, 1956, 1968, 1980, 1992, 2004, 2016, 2028</li>
                        <li>Rooster: 1909, 1921, 1933, 1945, 1957, 1969, 1981, 1993, 2005, 2017, 2029</li>
                        <li>Dog: 1910, 1922, 1934, 1946, 1958, 1970, 1982, 1994, 2006, 2018, 2030</li>
                        <li>Pig: 1911, 1923, 1935, 1947, 1959, 1971, 1983, 1995, 2006, 2019, 2031</li>
                    </ul>

                    <p>From the above chart information, we can see that:</p>

                    <ul>
                        <li>2015 is the year of the Sheep.</li>
                        <li>2016 is the year of the Monkey.</li>
                        <li>2017 is the year of the Rooster.</li>
                        <li>2018 is the year of the Dog.</li>
                        <li>2019 is the year of the Pig.</li>
                        <li>2020 is the year of the Rat.</li>
                    </ul>

                    <p>In addition to the animal sign, the Chinese zodiac also has five nature elements: earth, fire, metal, water, and wood. Chinese astrology believes one's destiny can be determined by the planets' and sun's postions at the time of their birth. It may be a surprise, but the Chinese zodiac doesn't view the coming of your animal sign as good luck as this offends the God of Age. The best course of action to take to prevent bad luck during these years is to wear at red item given by an elder relative such as a wristband, necklace, anklet, socks, etc.</p>
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
