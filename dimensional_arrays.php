<?php 
echo date('d m y').'<br>';
echo date('D M Y').'<br>';
echo date('d/m/y').'<br>';
echo date('d-m-y').'<br>';

$exp=time() + 86400;
$exp2=time() + 120;
$string="
My 
Name is
called 
waswa Rodgers
";
echo $string;
echo nl2br($string);
//setcookie('name','Waswa',$exp);
//setcookie('age',25,$exp);
//setcookie('Name', 'Rodgers', $exp2);
//setcookie('name','Kegan', $exp);
if (isset($_COOKIE['name'])) {

	echo $_COOKIE['name'];
	

} else {
	echo "Cookie not set<br/>";
}

$GLOBALS['country']=array('Details'=>array('Name'=>'Kenya'),
	'Counties'=>array('Name'=>'Muranga',
		'Location'=>'Central',
		'Other_Details' => array('Tribe' => 'Gikuyus',
			'Population'=>'14' )),
	'Provinces'=>7);

function country_data($key, $value){
	if (array_key_exists($key, $GLOBALS['country'])===true) {
		return $GLOBALS['country'][$key][$value];
	} else {
		return false;
	}

}

echo 'Data returned: '.country_data('Counties', 'Name');
echo '<pre>'.'Array for country details: <br/>'.print_r($GLOBALS['country'], true).'</pre';


$GLOBALS['level']=array(
	1=>array(
		'name'=>'Level 1',
		'desc'=>'This is level one'
	),

	2=>array(
		'name'=>'Level 2',
		'desc'=>'This is level two'
	),

	3=>array(
		'name'=>'Level 3',
		'desc'=>'This is level three'
	)
);

function level_data($level, $data){
	if (array_key_exists($level, $GLOBALS['level'])===true) {
		return $GLOBALS['level'][$level][$data];
	} else {
		
		return false;
	}
}


echo 'Data returned: '.level_data(4,'name');

echo '<pre>'.'Array for levels data: <br/>'.print_r($GLOBALS['level'], true).'</pre';
//echo '<p>Muranga has '.$country['Counties']['Other_Details']['Population'].' '.'million people';

/*function add($num1, $num2){
	return($num1 + $num2);
}
echo '10 + 30 ='.' '.add(10,30).'<br/>';
echo '100 + 30 ='.' '.add(100,30).'<br/>';
echo '10 + 300 ='.' '.add(10,300).'<br/>';

function multiply($num1, $num2){
	return($num1 * $num2);
}
echo '10 X 30 ='.' '.multiply(10,30).'<br/>';
echo '100 X 30 ='.' '.multiply(100,30).'<br/>';
echo '10 X 300 ='.' '.multiply(10,300).'<br/>';

function divide($num1, $num2){
	return($num1 / $num2);
}
echo '10 / 30 ='.' '.divide(10,30).'<br/>';
echo '100 / 30 ='.' '.divide(100,30).'<br/>';
echo '10 / 300 ='.' '.divide(10,300).'<br/>';

function person($name, $age, $phone){
	$person='Name: '.$name.'<br/>'.'Age: '.$age.'<br/>'.'Phone: '.$phone.'<br/>';
	return $person;
}
echo person('Rodgers',25, '09877777777').'<br/>';
echo person('Nikel',30, '08765443333').'<br/>';
echo person('Komuono',24, '0789665445').'<br/>';
?>*/