<?php
require_once '../vendor/autoload.php'; // Ajustez le chemin selon votre structure
use App\Models\User;

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];
    $userModel = new User();
    $user = $userModel->getUserByResetToken($token);

    if (!$user) {
        echo "Token invalide ou expiré.";
        exit;
    }

    // Afficher le formulaire pour le nouveau mot de passe
    ?>

    <?php $this->includeComponent("form", $configForm, $errorsForm, "button button-primary");?>

    <?php
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['token'], $_POST['new_password'])) {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];

    // Vérification et mise à jour du mot de passe
    $userModel = new User();
    $success = $userModel->resetPassword($token, $newPassword);

    if ($success) {
        echo "Votre mot de passe a été réinitialisé avec succès.";
    } else {
        echo "Erreur lors de la réinitialisation du mot de passe.";
    }
} else {
    echo "Accès invalide.";
}
?>
