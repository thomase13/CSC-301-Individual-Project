<!--QUERY SETUP-->
<?php
$settings = [
	'host'=>'localhost',
	'db'=>'users',
	'user'=>'root',
	'pass'=>''
];

$opt=[
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
];

//CONNECT TO DATABASE
$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',$settings['user'],$settings['pass'],$opt);
?>

<!--INDEX-->
<?php
$result=$pdo->query('SELECT name, age FROM companions'); //EXECUTE QUERY

//PROCESS RESULTS
/* echo '<table border="1">';
echo '<pre>';
while($record = $result->fetch()) {
	echo '<tr><td>'.$record['name'].'</td><td>'.$record['age'].'</td></tr>';
	echo '<hr>';
}
echo '</table>'; */
?>

<!--DETAIL-->
<?php
/* $result=$pdo->query('SELECT * FROM companions WHERE companionID=12');
if($result->rowCount() == 0) {
	echo '<p>There is no result matching your query.' ;
	die();
}
$record=$result->fetch();
echo '<h1>'.$record['name'].'</h1>';
echo '<p>Age: '.$record['age'].'</p>';
echo '<p>Gender: '.$record['gender'].'</p>';
echo '<p>Size: '.$record['size'].'</p>';
echo '<p>Health: '.$record['health'].'</p>'; */
?>

<!--CREATE-->
<?php
/* $pdo->query('INSERT INTO companions(name,picture,age,gender,size,health) VALUES("James","https://www.petmd.com/sites/default/files/senior-golden-retriever-with-ball-picture-id488657289.jpg","8 Years","Male","Large","Vaccinations up to date, neutered")'); */
?>

<!--MODIFY-->
<?php
/* $pdo->query('UPDATE companions SET name="Dr. James" WHERE companionID=10'); */
?>

<!--DELETE-->
<?php

/* $pdo->query('DELETE FROM companions WHERE companionID=10');
echo "Code Executed"; */
?>
