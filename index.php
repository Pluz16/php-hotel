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

$filtered_hotels = [];

if (isset($_GET['parking'])) {
	$filtered_parking = filter_input(INPUT_GET, 'parking', FILTER_VALIDATE_BOOLEAN);
	$filtered_vote = filter_input(INPUT_GET, 'vote', FILTER_VALIDATE_INT);

	foreach ($hotels as $hotel) {
		if ((!isset($_GET['parking']) || $hotel['parking'] == $filtered_parking) &&
			(!isset($_GET['vote']) || $hotel['vote'] >= $filtered_vote)) {
			$filtered_hotels[] = $hotel;
		}
	}
} else {
	$filtered_hotels = $hotels;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Stile bootstrap -->
    <style>
		body {
			background-color: #C9E6F7;
		}

		h1 {
			font-size: 36px;
			font-weight: bold;
		}

		table {
			margin-top: 20px;
		}

		table th, table td {
			text-align: center;
			padding: 10px;
		}

		table th {
			background-color: #007BFF;
			color: #fff;
		}

		table tr:nth-child(even) {
			background-color: #F0F0F0;
		}

		table tr:hover {
			background-color: #E0E0E0;
			cursor: pointer;
		}
	</style>

</head>
<body>
	<div class="container">
		<h1 class="text-center my-4">Elenco Hotel</h1>
		<form class="mb-4">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="parking" id="parking" <?php if (isset($_GET['parking'])) { echo ($_GET['parking'] ? 'checked' : ''); } ?>>
				<label class="form-check-label" for="parking">
					Disponibilità parcheggio
				</label>
			</div>
			<button type="submit" class="btn btn-primary">Filtra</button>
		</form>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrizione</th>
					<th>Parcheggio</th>
					<th>Voto</th>
					<th>Distanza dal centro</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($filtered_hotels as $hotel) { ?>
				<tr>
					<td><?php echo $hotel['name']; ?></td>
					<td><?php echo $hotel['description']; ?></td>
					<td><?php echo ($hotel['parking'] ? 'Si' : 'No'); ?></td>
					<td><?php echo $hotel['vote']; ?></td>
					<td><?php echo $hotel['distance_to_center'] . ' km'; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>