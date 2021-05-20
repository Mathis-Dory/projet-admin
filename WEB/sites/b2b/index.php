<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title> Site B2B l1-2 - Config WEB</title>
		<style type="text/css">
			body {
				background-color: #FFD79E;
			}
			p {
				text-align: center;
			}
		</style>
</head>
<body>
<h1>Bienvenue sur le site B2B</h1>
<p> Responsable du service WEB - Eliott Lepage </p>
<p>Output : données de la base de données</p><br><br>
		<pre>
        <?php
            $query ='SELECT * FROM b2bboutique;';
            try
            {
                $db = new PDO('mysql:host=172.17.0.3;dbname=b2b','directeur','azerty');
                $answer = $db->query($query);

                foreach($answer->fetchAll(PDO::FETCH_ASSOC) as $row) {
                print_r($row);
                }
                $db = null;
            }
            catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
            }
			
            echo '<hr><br>';
            echo '</pre>'; ?>
</body>
</html>
