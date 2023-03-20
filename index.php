<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel List</title>
</head>
<body>
	<h1>Elenco Hotel</h1>
	<table>
		<tr>
			<th>Nome</th>
			<th>Descrizione</th>
			<th>Parcheggio</th>
			<th>Voto</th>
			<th>Distanza dal centro</th>
		</tr>
		<?php foreach ($hotels as $hotel) { ?>
		<tr>
			<td><?php echo $hotel['name']; ?></td>
			<td><?php echo $hotel['description']; ?></td>
			<td><?php echo ($hotel['parking'] ? 'Si' : 'No'); ?></td>
			<td><?php echo $hotel['vote']; ?></td>
			<td><?php echo $hotel['distance_to_center'] . ' km'; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>