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
            $query ='SELECT * FROM shopb2b;';
            try
            {
                $db = new PDO('mysql:host=172.17.0.2;dbname=b2bl12', 'fpm', 'mysqlb2b');
                $answer = $db->query($query);

                foreach($answer->fetchAll(PDO::FETCH_ASSOC) as $row) {
                print_r($row);
                }
                $db = null;
            }
            catch (PDOException $e) {
				echo 'La connexion a échouée !';
            }

            echo '<hr><br>';
            echo '</pre>'; ?>
<h1>Bienvenue sur le site B2B</h1>
<?php echo phpinfo(); ?>
</body>
</html>
