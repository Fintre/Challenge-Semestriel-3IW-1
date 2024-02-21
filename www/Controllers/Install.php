<?php

namespace App\Controllers;

use App\Forms\InstallSite;
use App\Core\View;
use App\Core\Verificator;
use PDO;
use PDOException;
class Install
{
    public function run()
    {
        $form = new InstallSite();
        $config = $form->getConfig();
        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) { // Si le formulaire est soumis

            $verificator = new Verificator(); // Créer une instance de la classe Verificator
            if ($verificator->checkForm($config, $_REQUEST, $errors)) { // Vérifier le formulaire

                $adminUsername = $_REQUEST['admin_username'] ?? ''; //recupère la valeur de admin_username
                $adminPassword = $_POST['admin_password'] ?? ''; //recupère la valeur de admin_password
                $dbname = $_POST['dbname'] ?? ''; //recupère la valeur de dbname
                $dbuser = $_POST['dbuser'] ?? ''; //recupère la valeur de dbuser
                $dbpassword = $_POST['dbpwd'] ?? ''; //recupère la valeur de dbpassword
                $tablePrefix = $_POST['table_prefix'] ?? '';    //recupère la valeur de table_prefix

                // Créer le fichier de configuration
                $configContent = "<?php\n";
                $configContent .= "// Configuration de la base de données\n";
                $configContent .= "define('DB_HOST', 'postgres:5432');\n"; //
                $configContent .= "define('DB_NAME', '" . addslashes($dbname) . "');\n";
                $configContent .= "define('DB_USER', '" . addslashes($dbuser) . "');\n";
                $configContent .= "define('DB_PASSWORD', '" . addslashes($dbpassword) . "');\n";
                $configContent .= "define('TABLE_PREFIX', '" . addslashes($tablePrefix) . "');\n";

                echo $configContent;
                file_put_contents('config.php', $configContent);

            if (file_put_contents('config.php', $configContent) === false) { // Créer le fichier de configuration
                die('Erreur lors de la création du fichier de configuration.');
            }
            // Chemin relatif pour remonter d'un niveau à partir de `www`
            $envPath = __DIR__ . '/../../.env';

            // Assurez-vous de construire votre contenu de .env ici
            $envContent = "POSTGRES_USER={$dbuser}\n";
            $envContent .= "POSTGRES_PASSWORD={$dbpassword}\n";
            $envContent .= "POSTGRES_DB={$dbname}\n";

            // Écriture dans le fichier .env à la racine du projet
            file_put_contents($envPath, $envContent, FILE_APPEND | LOCK_EX);

            try {
                var_dump($dbname);
                $pdo = new PDO("pgsql:host=postgres;port:5432;dbname=$dbname;user=$dbuser;password=$dbpassword");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $bddPath = __DIR__ . '/../BDD.sql';
                var_dump($bddPath);
                // script SQL
                $sqlScript = file_get_contents($bddPath);

                $sqlScript = str_replace("{prefix}", $tablePrefix, $sqlScript);

                $sqlStatements = explode(";", $sqlScript);

                // Exécuter chaque instruction SQL
                foreach ($sqlStatements as $statement) {
                    $trimmedStatement = trim($statement);
                    if ($trimmedStatement) {
                        $pdo->exec($trimmedStatement);
                    }
                }

            } catch (PDOException $e) {
                die('Erreur lors de l\'exécution du script SQL ou de la connexion à la base de données : ' . $e->getMessage());
            }

            // Redirection ou gestion de la suite du processus d'installation
            echo "ok";

            }
        }
        // Utiliser votre système de vue pour inclure le formulaire
        $myView = new View("install");
        $myView->assign("configForm", $config);
        // Pas d'erreurs ou succès initiaux pour l'installation
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);

    }

    public function check()
    {
        echo "Installation de l'application";
    }


}
