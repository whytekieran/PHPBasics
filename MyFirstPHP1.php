<?php
//Creating variables. Variables always start with $
$firstName = 'Kieran'; //String variable
$wholeNumber = 27;  //Integer
$decimalNumber = 46.8;  //double
$trueOrFalseValue = true;   //boolean
$startDate = '2009-22-4'; //Dates like this, write as same format as SQL YY-MM-DD can be useful
						  //Can use the isset() function to check if a variable has been defined with a value.

//Date functions
echo 'Todays date is: '.date('m/d/Y').'<br/>';
echo 'Todays date and time is: '.date('m/d/Y h:i:s').'<br/>';
echo 'Date in German format: '.date('d.m.Y').'<br/>';
echo 'RFC Formatted date: '.date('r').'<br/>';
echo 'Today is: '.date('l').'<br/>';

//Accessing tomorrows date 
$tomorrowSecs = mktime(0, 0, 0, date('m'), date('d') + 1, date('y'));//seconds since epoch that will have elapsed
$tomorrowDateArray = getdate($tomorrowSecs);//tomorrow date array is now an associative array key/value
echo 'Outputting keys/values for tomorrows date (from tomorrowDateArray):'.'<br/>';
foreach($tomorrowDateArray as $key => $value)
{
	echo $key.' = '.$value.'<br/>'; 
}

//The keys can the be used to output the value we want
echo 'Tomorrow is: '.$tomorrowDateArray['weekday'].'<br/>';
//echo "Tomorrow is: {$tomorrowDateArray['weekday']}<br/>";//with double qoutes a complex variable is inside {}

//Calculating xmas day 2016
$xmasSecs = mktime(0, 0, 0, 12, 25, 2016);
$xmasDateArray = getdate($xmasSecs);
echo 'Xmas day 2016 is on a '.$xmasDateArray['weekday'].'<br/>';

//Very simple concatenation, better to use double qoutes to format strings.
$day = 'Thursday';
$date = 12;
$year = 2015;
echo 'Using html tags to make this random date bold. <strong>'.$day.' '.$date.' '.$year.'</strong><br/>'; //. (dot) used to concatenate. Includes html
$someText = 'Hi';
$someText .= ' Kieran'; //Assignment operator for strings .= (concatenation)
echo $someText .'<br/>';
echo strlen("Hello world!").'<br/>'; //length of a string

//Timestamps
echo 'Seconds that have passed since January 1st 1970: '.time().'<br/>';
$theTimeSecs = time();//Seconds since epoch(timestamp)
$actualTime = date('H:i:s', strtotime('-1 hours'));//Hours:Mins:Secs It was an hour ahead so this takes an hour away
													//the $theTimeSecs var isnt needed when using strtotime() to modify timestamps
													//strtotime() can be used to add or subtract time from a date
													
$actualDate = date('d m Y', $theTimeSecs);//day/month/year 
$dateTime = date('D M Y @ H:i:s', strtotime('-1 hours'));//It was an hour ahead so this takes an hour away
$modDateTime = date('D M Y @ H:i:s', strtotime('+5 week 1 hours 34 seconds'));//Example of strtotime modifying a date/time
echo 'Todays current time is: '.$actualTime.'<br/>';
echo 'Todays current date is: '.$actualDate.'<br/>';
echo 'Todays current date/time is: '.$dateTime.'<br/>';
echo 'Modified with strtotime() date/time is: '.$modDateTime.'<br/>';


//More Formatting and concatenation using double qoutes. Single qoutes wont work this way.
echo 'Showing the difference between output with single and double qoutes. (unformatted vs formatted)' .'<br/>';
$variable = "Name Here!";
$literally = 'My variable: $variable will not print!';     //will not work with single qoutes
echo $literally .'<br/>';
$literally = "My variable: $variable will print!";         //this will work and output variables value
echo $literally .'<br/>';

//Looping over a string character by character
$myName = 'Kieran';
$firstE = strpos($myName, 'e'); //finding position of 'e' in kieran. stripos() is case insensitive. Third parameter is optional and
								//is the offset (where we start the search from)
echo 'First e is at position: '.$firstE.'<br/>';//outputting

//Looping over a string and find each position of a paticular word
$varString = 'This string is an example that we are using. It is cool';//The string
$offset = 0; //The offset (starting position for the search)
$find = 'is'; //The word we are looking for
$findLen = strlen($find); //Length of the string we are searching

while($currentPos = strpos($varString, $find, $offset))//Start looping over the string.
{
	echo 'The word '.$find.' was found at position '.$currentPos.'<br/>';//Output the word and what position it was found
	$offset = $currentPos + $findLen;//Increment the offset to the start of where last word was found, plus the words length.
}

//looping over a string character by character
for($i = 0; $i < strlen($myName); ++$i)
{
	$character = $myName[$i];
	echo $character .'<br/>';
}

//Getting out part of a string
$startTime = '2015-08-22 20:30:00';
$extractedYear = substr($startTime, 0, 4);
echo 'Extracted year is: '.$extractedYear.'<br/>';

//Searching for a match in a string using the preg_match function
$myString = 'This is a string.';

if(preg_match('/is/', $myString) == 1)//Needs the double slashes. Just means check for this word as is.
{
	echo 'Part of the string matches'.'<br/>';
}
else if(preg_match('/is/', $myString) == 0)
{
	echo 'No match found'.'<br/>';
}

//String upper and lowercase conversion
$stringVar = 'I am a string example';
$lString = strtolower($stringVar);
$uString = strtoupper($stringVar);
echo $lString.'<br/>';
echo $uString.'<br/>';

//Counting the words in a string
$sentence = 'Its such a beautiful day!';
$wordCnt = str_word_count($sentence, 0);//simply outputs how many words are in the sentence
//$wordCnt = str_word_count($sentence, 1);//creates an array from the sentence, each word is an element
//$wordCnt = str_word_count($sentence, 2);//creates an associate array key:startposofword value:word
//$wordCnt = str_word_count($sentence, 0, '&.*!');//allows inclusion of special characters like & . and more
echo 'Wordcount is: '.$wordCnt.'<br/>';

//Randomly shuffles a string, useful on some occasions
$string = 'abcdefghijklmnopqrstuvwxyz0123456789';
$shuffledString = str_shuffle($string);
echo $shuffledString.'<br/>'; 

//Reversing a string
$exampleText = 'This is a string example';
$reversedString = strrev($exampleText);
echo $reversedString.'<br/>';

//Replacing part of a string
$exampleString = 'The cat sat on the mat';
$exampleString = str_replace('cat', 'dog', $exampleString);//Three arguments, the search word and the word to replace it & the string 
echo $exampleString.'<br/>';

//Case insensitive string comparision
$var1 = "Hello";
$var2 = "hello";
if (strcasecmp($var1, $var2) == 0) //case sensitive function is strcmp()
{
	echo 'They are equal'.'<br/>';
}
else
{
	echo 'They are not equal'.'<br/>';
}

//Trim whitespace from a string 
$text = ' This text is an example of a string ';
$trimmedString = trim($text); //trims whitespace from left and right sides. useful when comparing strings

//Random Number Generation
$randomNum1 = rand();//Random number with no min or max
$max = getrandmax(); //Getting the predefined maximum for rand()
echo 'First random number no arguments in rand() function '.$randomNum1.' the max number is '.$max.'<br/>';

//Mathematical functions
$testScore1 = 34.9;
$testScore2 = 74.2475;
//$scores = array(23, 67, 34, 88, 12, 97, 96, 99, 55, 24);//declaring an array of 10 scores.
$scores = array();

//Here we use the mt_rand() function to create 10 random scores. Showing how to create random numbers.
for($j = 0; $j < 10; ++$j)
{
	$scores[$j] = mt_rand(0, 100);//creating a random number from 0-100 and adding it to the array.
}

sort($scores);//sorting the numbers in order of smallest to largest
echo 'Scores were: '.implode(', ',$scores). '<br/>';//implode() joins the array elements into a string
													//first argument to implode() is how they will be seperated
echo 'Minimum score was '.min($scores).'<br/>';
echo 'Maximum score was '.max($scores).'<br/>';
echo 'Average score was '.array_sum($scores)/count($scores).'<br/>';//no average function in php but we can calculate like this.
																	//the %(modulus gives the remainder like other languages)

echo 'Rounded score '.round($testScore1).'<br/>';//round to 0 decimal places
echo 'Rounded score '.round($testScore2, 3).'<br/>';//round to 3 decimal places
echo M_PI.'<br/>'; //This is a constant representing PI.

//Converting a string into an array
$pizza = 'slice1 slice2 slice3 slice4 slice5 slice6 slice7 slice8';
$slices = explode(' ', $pizza);//Opposite of implode, turns the string into an array.
echo $slices[0].'<br/>';//showing output of the elements in the newly created array
echo $slices[7].'<br/>';

//Arrays, very useful for storing data, different arrays have different purposes
//Simple Array Declaration
$names = array('Kieran', 'David', 'Aimee', 'Colin'); //Array data type
//If we wish to simply output the elements of an array echo wont work. We use print_r
print_r($names).'<br/>'; //outputting array elements need to use print_r() for that
$testArray = array();  //Declaring empty array

//Associative Arrays (keys must be unique)
$salaries = array(
		"mohammad" => 2000,
		"qadir" => 1000,
		"zara" => 500
);
$salaries['Kieran'] = 5000; //adding new value to the associative array.

//Looping over an associative array
echo '<br/>';
foreach($salaries as $employee => $salary)
{
	echo "Employee: $employee Earns: $salary ".'<br/>';
}

//Outputting values in associative arrays.
echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
echo "Salary of qadir is ".  $salaries['qadir']. "<br />";
echo "Salary of zara is ".  $salaries['zara']. "<br />";
echo "Salary of Kieran is ".  $salaries['Kieran']. "<br />";

//Multidimensional Arrays
$marks = array(
		"mohammad" => array
		(
				"physics" => 35,
				"maths" => 30,
				"chemistry" => 39
		),
		"qadir" => array
		(
				"physics" => 30,
				"maths" => 32,
				"chemistry" => 29
		),
		"zara" => array
		(
				"physics" => 31,
				"maths" => 22,
				"chemistry" => 39
		)
);

//Adding new nested array(kieran) with values. If the nested arrays of mohammad, qadir, zara
//or kieran had another array inside them for example called 'subjects' we could do something like this:
//$marks["kieran"]["subjects"] = array("physics" => 46, "maths" => 58, "chemistry => 30");
$marks["kieran"] = array("physics" => 46, "maths" => 58, "chemistry" => 30);

//Looping over a multidimensional array using a nested foreach loop.
foreach($marks as $student => $grades)
{
	echo '<b>' .$student. '</b>'.'<br/>';
	
	foreach($grades as $subject => $mark)
	{
		echo $subject. ' = ' .$mark.'<br/>';
	}
}

//Accessing multi-dimensional array values 
echo "Marks for mohammad in physics : " ;
echo $marks['mohammad']['physics'] . "<br />";
echo "Marks for qadir in maths : ";
echo $marks['qadir']['maths'] . "<br />";
echo "Marks for zara in chemistry : " ;
echo $marks['zara']['chemistry'] . "<br />";
echo "Marks for kieran in maths : " ;
echo $marks['kieran']['maths'] . "<br />";

//Constant values
define("FULL_MARKS", 100); //defining a constant
echo FULL_MARKS .'<br/>'; //outputting the constant
echo "The constant is " .constant("FULL_MARKS") .'<br/>'; //outputting the constant formatted use constant()

//Outputting with echo, We can include html tags in an echo statement.
echo 'Using the echo statement to output the following header text';
echo '<h1>Hello PHP world, im Kieran Whyte using the eclipse IDE :D</h1>'; //Output using echo and HTML tags

echo '<div style="color:red">Hello!!</div>'; //Can output HTML using echo

echo $firstName .'<br/>';	        //outputting variable			  
$type1 = gettype($firstName);       //getting variables data type                                          	
echo "Type is: $type1" .'<br/>';    //outputting the type, use "" double qoutes for formatted text

echo $wholeNumber .'<br/>';	        //outputting a second variable
$type2 = gettype($wholeNumber);       //getting variables data type
echo "Type is: $type2" .'<br/>';    //outputting the type, use "" double qoutes for formatted text


//Simple if/else statement
//Using === compares values and also their data type for equality. for example:
//a = 1;
//b = '1';
//if(a == b) True because 1 = 1.
//if(a === b) False, 1 and 1 are equal. But one type is an integer and the other is a string. Not equal types.
if($trueOrFalseValue == true)
{
	echo 'Yup its a true value' .'<br/>';
}
else
{
	echo 'Its a false this time' .'<br/>';	
}

//Slightly more complicated if/else if.  Still the same as most programming languages (eg Java)
$number = 79; //79			//Using assignment operators
++$number;    //80
$number += 25; //105
$number -= 6; //99
--$number; //98

if($number >= 1 && $number <= 25)
{
	echo 'Between 0 and 25' .'<br/>';
	echo $number .'<br/>';
}
else if($number > 25 && $number <= 50)
{
	echo 'Between 25 and 50' .'<br/>';
	echo $number .'<br/>';
}
else if($number > 50 && $number <= 75)
{
	echo 'Between 50 and 75' .'<br/>';
	echo $number .'<br/>';
}
else if($number > 75 && $number <= 100)
{
	echo 'Between 75 and 100' .'<br/>';
	echo $number .'<br/>';
}

//Switch statement
$color = 'Red';
switch($color)
{
	case 'Red':
		echo 'Its red' .'<br/>';
		break;
	case 'blue':
		echo 'Its red' .'<br/>';
		break;
	default:
		echo 'Ive no idea' .'<br/>';
		break;
}

//Loops
//Simple foreach loop to iterate over array declared above.
foreach($names as $name)
{
	echo $name .'<br/>';
}
unset($name); // break the reference for variable '$name'

//Simple for loop
for($i = 0; $i < count($names); ++$i)//count() function returns number of elements in array $names
{
	echo "Number:".($i+1)."  Name:$names[$i]" .'<br/>';
}

//While loop
$controlVar = 1;
while($controlVar <= 5)
{
	echo "Number: $controlVar" .'<br/>';
	++$controlVar;
}

//do-while
$cnt = 0;
do
{
	echo $cnt.'<br/>';
	++$cnt;
}
while($cnt < 5);

//Functions
//Simple function with no arguments
//Important to remember that if we wish to pass a variable by reference into a function, we use the & symbol
//like this: function myFunction(&$myVariable)
function myName()
{
	echo 'Kieran';
}
//Calling the function
echo 'My name is ';
myName();

//Functions with a parameter and a return value creates a dahed line.
function horizontalLine5px($color)
{
	return  '<hr style="border: 5px dashed '.$color. '"/>';
}

function horizontalLine3px($color = 'red')//defualt value for the parameter
{
	return  '<hr style="border: 3px dashed '.$color. '"/>';
}

//Function returns an answer
function addNumbers($number1, $number2)
{
	$answer = $number1 + $number2;
	return $answer;
}

function divideNumbers($number1, $number2)
{
	$answer = $number1 / $number2;
	return $answer;
}

//Calling funtions
echo horizontalLine5px('blue');
echo horizontalLine3px();			//has been already given a defualt parameter of red
echo horizontalLine3px('green');	//the defualt parameter can be overidden, produces green
echo addNumbers(10, 20) + addNumbers(5, 10).'<br/>';
$sum = divideNumbers(addNumbers(10, 20), addNumbers(5, 10)); //function taking functions as arguments
echo $sum.'<br/>';

//Example of global variables
$user_ip = $_SERVER['REMOTE_ADDR']; //Returns the users IP (::1) = 127.0.0.1 which is my localhost address

function echo_ip()
{
	//The global keyword is neccessary so we can use $user_ip as a global variable.
	//can declare as many global variables here as possible eg global var1, var2, var3, var4;
	global $user_ip;  //declaring this variable as global
	$text = 'Your IP address is: '.$user_ip.'<br/>';
	echo $text;
}

echo_ip();//calling the above function



?>