<?php

// Inclusion de l'autoloader (ajustez le chemin selon votre structure de projet)
require_once "index.php";

use App\Forms\InstallSite;
use App\Core\View;
use App\Core\Verificator;

// Affichage du formulaire si la requête n'est pas POST
$form = new InstallSite();
$config = $form->getConfig();

if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
    $verificator = new Verificator();
    if ($verificator->checkForm($config, $_REQUEST, $errors)) {

    $adminUsername = $_POST['admin_username'] ?? '';
    $adminPassword = $_POST['admin_password'] ?? '';
    $dbname = $_POST['dbname'] ?? '';
    $dbuser = $_POST['dbuser'] ?? '';
    $dbpassword = $_POST['dbpassword'] ?? '';
    $dbhost = $_POST['dbhost'] ?? 'localhost';
    $tablePrefix = $_POST['table_prefix'] ?? '';


    $configContent = "<?php\n";
    $configContent .= "// Configuration de la base de données\n";
    $configContent .= "define('DB_HOST', '" . addslashes($dbhost) . "');\n";
    $configContent .= "define('DB_NAME', '" . addslashes($dbname) . "');\n";
    $configContent .= "define('DB_USER', '" . addslashes($dbuser) . "');\n";
    $configContent .= "define('DB_PASSWORD', '" . addslashes($dbpassword) . "');\n";
    $configContent .= "define('TABLE_PREFIX', '" . addslashes($tablePrefix) . "');\n";


    if (file_put_contents('config.php', $configContent) === false) {
        die('Erreur lors de la création du fichier de configuration.');
    }


    try {
        $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Charger le script SQL
        $sqlScript = file_get_contents('chemin/vers/votre_script.sql'); // Assurez-vous que le chemin est correct

        // Remplacer le placeholder {prefix} par le préfixe de table fourni
        $sqlScript = str_replace("{prefix}", $tablePrefix, $sqlScript);

        // Découper le script SQL en instructions individuelles
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
    header('Location: success.php');
    exit;
    }
}


// Utiliser votre système de vue pour inclure le formulaire
$myView = new View("install");
$myView->assign("configForm", $config);
// Pas d'erreurs ou succès initiaux pour l'installation
$myView->assign("errorsForm", []);
$myView->assign("successForm", []);
