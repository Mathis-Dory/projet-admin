<!-- Fichier .php concernant le site b2b de WoodyToys -->
<!-- le site nous permety de récupérer les données de la base de données MySQL et également l'ajout de données dans celle-ci -->

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title> Site B2B l1-2 - Config WEB</title>
		<style>
			body {
				background-color: #FFD79E;
			}
			p {
				text-align: center;
			}
			table {
				margin-right:auto;
				margin-left: auto;
				margin-top: 50px; 
				align: center;
			}
			tr, td {
				padding: 3px 6px 3px 6px;
			}
			form {
				margin-top: 10px
				margin-left: 30px;
			}
			.button {
				border:0.16em solid black;
 				border-radius:10px;
				text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
 				text-align:center;
			}
		</style>
</head>

<body>
	<h1>Bienvenue sur le site B2B</h1>
	<p> Responsable du service WEB - Eliott Lepage </p>
	<p>Output : données de la base de données</p><br><br>
	<span><strong>Formulaire d'encodage</strong></span><br/><br/>


	<form method="post" action="index.php">  
	  <strong>ARTICLE:</strong> <input type="text" name="article" id="article" required>
	  <br><br>
	  <strong>DESCRIPTION:</strong> <textarea type="text" name="description" id="description" rows="3" cols="40" required></textarea>
	  <br><br>
	  <strong>PRIX: </strong><input type="number" name="prix" id="prix" min="0.01" value="0.00" step=".01" required>
	  <br><br>
	  <input class="button" type="submit" name="submit" value="Submit">
	</form>

	<?php
		
		$article = $_POST["article"];
		$description = $_POST["description"];
		$prix = $_POST["prix"];
		$prix_float = floatval($prix);
		
		if( isset($_POST['submit'])) {
			try {
			  $conn = new PDO('mysql:host=172.17.0.3;dbname=b2b','directeur','azerty');
			  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			  $sql = "INSERT INTO b2bboutique (ARTICLE, DESCRIPTION, PRIX)
			  VALUES ('$article', '$description', $prix_float)";
				
			  $conn->exec($sql);
			  echo "New record created successfully";
			}
			 
			catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}
	?>

	 <?php
				$query ='SELECT * FROM b2bboutique;';
				try
				{
					$db = new PDO('mysql:host=172.17.0.3;dbname=b2b','directeur','azerty');
					$answer = $db->query($query);
					
					$output = "<table>";
					foreach(($answer->fetchAll(PDO::FETCH_ASSOC)) as $key => $var) {
						//$output .= '<tr>';
						if($key===0) {
							$output .= '<tr>';
							foreach($var as $col => $val) {
								$output .= "<td><strong>" . $col . '</strong></td>';
							}
							$output .= '</tr>';
							foreach($var as $col => $val) {
								$output .= '<td>' . $val . '</td>';
							}
							$output .= '</tr>';
						}
						else {
							$output .= '<tr>';
							foreach($var as $col => $val) {
								$output .= '<td>' . $val . '</td>';
							}
							$output .= '</tr>';
						}
					}
					$output .= '</table>';
					echo $output;

					$db = null;
				}
				
				catch (PDOException $e) {
					print "Erreur !: " . $e->getMessage() . "<br/>";
					die();
				}
				echo '<hr><br>';?>
				


</body>
</html>
