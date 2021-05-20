<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title> Site B2B l1-2 - Config WEB</title>
</head>
<body>
<p> Responsable du service WEB - Eliott Lepage </p>
<p>Vérification de la configuration de la db</p>
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
<h1>Welcome to our site B2B</h1>
<?php echo phpinfo(); ?>
</body>
</html>
