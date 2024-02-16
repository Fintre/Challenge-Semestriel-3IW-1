<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\AddUser;
use App\Forms\InitPassword;
use App\Models\User;
use App\Forms\Connexion;
use App\Forms\Login;
use App\Forms\RequestResetPassword;
use App\Core\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

class Security
{

    public function login(): void
    {
        $formLogin = new Login();
        $configLogin = $formLogin->getConfig();
        $errorsLogin = [];

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === $configLogin["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($configLogin, $_REQUEST, $errorsLogin)) {
                // Récupérer les données du formulaire
                $email = $_REQUEST['email'];
                $password = $_REQUEST['pwd'];

                // Créer une instance du modèle User et vérifier les identifiants
                $userModel = new User();
                $user = $userModel->checkUserCredentials($email, $password);

                if ($user) {
                    // Authentification réussie
                    session_start();
                    $_SESSION['user'] = $user; // Stocker les informations de l'utilisateur dans la session
                } else {
                    // Échec de l'authentification
                    $errorsLogin[] = 'Email ou mot de passe incorrect';
                }
            }
        }

        // Préparer la vue avec les données du formulaire et les erreurs
        $myView = new View("Security/login", "neutral");
        $myView->assign("configForm", $configLogin);
        $myView->assign("errorsForm", $errorsLogin);
    }

    public function register(): void
    {
        $form = new AddUser();
        $config = $form->getConfig();

        $errors = [];

        // Est ce que le formulaire a été soumis
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["method"] )
        {
            // Ensuite est-ce que les données sont OK
            $verificator = new Verificator();
            if($verificator->checkForm($config, $_REQUEST, $errors)){
                $user = new User();
                $user->setFirstname($_REQUEST['Prénom']);
                $user->setLastname($_REQUEST['Nom']);
                $user->setUsername($_REQUEST['Nom_d\'utilisateur']);
                $user->setEmail($_REQUEST['E-mail']);
                $user->setPwd($_REQUEST['Mot_de_passe']);
                $user->save(); //ajouter toutes les données dans la base de données
            }
        }

        $myView = new View("Security/register", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);

    }
    public function logout(): void
    {
        echo "Déconnexion";
    }

    public function requestResetPassword(): void {
        $form = new RequestResetPassword();
        $config = $form->getConfig();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['E-mail'];
            $userModel = new User();
            $user = $userModel->getOneBy(['email' => $email], 'object');

            if ($user) {
                $resetToken = bin2hex(random_bytes(50));
                $expires = new \DateTime('+1 hour');

                $userModel->setResetToken($resetToken);
                $userModel->setResetExpires($expires->format('Y-m-d H:i:s'));
                $userModel->save();

                // Envoyer l'email de réinitialisation
                $this->sendResetEmail($email, $resetToken);
            } else {
                // Gérer le cas où l'utilisateur n'existe pas
                $errors[] = 'Cet email n\'est pas associé à un compte existant.';
            }
        }

        $myView = new View("Security/requestResetPassword", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
    }


    private function sendResetEmail($email, $resetToken) {
        $mail = new PHPMailer(true); // Passer `true` active les exceptions

        try {
            // Configurations du serveur
            $mail->isSMTP(); // Utiliser SMTP pour envoyer l'email
            $mail->Host = 'smtp.gmail.com'; // Spécifiez vos serveurs SMTP
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = 'gofindme.contact@example.com'; // SMTP username
            $mail->Password = 'gofindme.2024'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer le cryptage TLS, `PHPMailer::ENCRYPTION_SMTPS` est aussi accepté
            $mail->Port = 587; // Port TCP à utiliser; 587 pour `PHPMailer::ENCRYPTION_STARTTLS`

            $mail->addAddress($email); // Ajouter l'adresse de l'utilisateur

            // Mise à jour du contenu pour utiliser le token
            $resetLink = "http://localhost/resetPassword?token=" . $resetToken; // Assurez-vous que ce chemin correspond à votre script de réinitialisation
            $mail->Body = 'Cliquez sur ce lien pour réinitialiser votre mot de passe: <a href="' . $resetLink . '">Réinitialiser le mot de passe</a>';

            $mail->send();
            echo 'Le message a été envoyé';
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function resetPassword(): void
    {
        $formInitPass = new InitPassword();
        $config = $formInitPass->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                $token = $_REQUEST['token'];
                $newPassword = $_REQUEST['Mot_de_passe'];

                $userModel = new User();
                $user = $userModel->getOneBy(['reset_token' => $token], 'object');

                if ($user && strtotime($user->getResetExpires()) >= time()) {
                    $user->setPwd(password_hash($newPassword, PASSWORD_DEFAULT));
                    $user->setResetToken(null);
                    $user->setResetExpires(null);
                    $user->save();
                    echo "Votre mot de passe a été réinitialisé avec succès.";
                } else {
                    echo "Erreur lors de la réinitialisation du mot de passe.";
                }
            }
        }

        $myView = new View("Security/resetPassword", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
    }



}
