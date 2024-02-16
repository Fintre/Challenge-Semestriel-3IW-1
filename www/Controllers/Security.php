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
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('Europe/Paris');

class Security
{

    public function login(): void
    {
        $formLogin = new Login();
        $configLogin = $formLogin->getConfig();
        $errorsLogin = [];
        $successLogin = [];

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
        $myView->assign("successForm", $successLogin);
    }

    public function register(): void
    {
        $form = new AddUser();
        $config = $form->getConfig();

        $errors = [];
        $success = [];
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
                $success[] = "Votre compte a bien été créé";
            }
        }

        $myView = new View("Security/register", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);

    }
    public function logout(): void
    {
        echo "Déconnexion";
    }

    public function requestResetPassword(): void {
        $form = new RequestResetPassword();
        $config = $form->getConfig();
        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $email = $_REQUEST['E-mail'];
            $userModel = new User();
            $userarray = $userModel->getOneBy(['email' => $email]);


            if ($userarray) {
                $resetToken = bin2hex(random_bytes(50));
                $expires = new \DateTime('+1 hour');

                // Supposons que $expiresTimestamp est votre timestamp Unix
                $expiresTimestamp = $expires->getTimestamp();

                // Convertir le timestamp Unix en format de date/heure compatible avec PostgreSQL
                $expiresDateTime = date('Y-m-d H:i:s', $expiresTimestamp);
                $userModel->setDataFromArray($userarray);
                $userModel->setResetToken($resetToken);
                // Passer cette chaîne de date/heure à setResetExpires ou directement dans votre requête SQL
                $userModel->setResetExpires($expiresDateTime);
                $userModel->save();

                // Envoyer l'email de réinitialisation
                $emailResult = $this->sendResetEmail($email, $resetToken);

                if (isset($emailResult['success'])) {
                    $success[] = $emailResult['success']; // Ajouter le message de succès au tableau
                } elseif (isset($emailResult['error'])) {
                    $errors[] = $emailResult['error']; // Ajouter le message d'erreur au tableau
                }
            } else {
                // Gérer le cas où l'utilisateur n'existe pas
                $errors[] = 'Cet email n\'est pas associé à un compte existant.';
            }
        }

        $myView = new View("Security/requestResetPassword", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }


    private function sendResetEmail($email, $resetToken) {
        $mail = new PHPMailer(true); // Passer `true` active les exceptions

        try {
            // Configurations du serveur
            $mail->isSMTP(); // Utiliser SMTP pour envoyer l'email
            $mail->Host = 'smtp.gmail.com'; // Spécifiez vos serveurs SMTP
            $mail->Port = 587; // Port TCP à utiliser; 587 pour `PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = 'gofindme.contact@gmail.com'; // SMTP username
            $mail->Password = 'hcnplwiqpmmqbwdp'; // SMTP password
            $mail->setFrom('gofindme.contact@gmail.com', 'Support GoFindMe');
            $mail->addAddress($email); // Ajouter le destinataire
            $mail->Subject = 'Recuperation de mot de passe GoFindMe';

            // Mise à jour du contenu pour utiliser le token
            $resetLink = "http://localhost/reset-password?token=" . $resetToken; // Assurez-vous que ce chemin correspond à votre script de réinitialisation
            $mail->Body = 'Cliquez sur ce lien pour réinitialiser votre mot de passe: ' . $resetLink;

            $mail->send();
            return ['success' => 'Le message a été envoyé'];
        } catch (Exception $e) {
            return ['error' => "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}"];
        }
    }

    public function resetPassword(): void
    {
        $formInitPass = new InitPassword();
        $token = $_GET['token'] ?? '';
        $config = $formInitPass->getConfig($token);

        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $token = $_REQUEST['token'] ?? '';

            if (empty($token)) {
                $errors[] = "Le token de réinitialisation est manquant.";
            } else {
                $verificator = new Verificator();
                if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                    $userModel = new User();
                    $user = $userModel->getOneBy(['reset_token' => $token]);
                    if (!$user || strtotime($user['reset_expires']) < time()) {
                        $errors[] = "Le token de réinitialisation est invalide ou a expiré.";
                    } else {
                        $pwd = $_POST['pwd'] ?? '';
                        $userModel->setDataFromArray($user);
                        $userModel->setPwd($pwd);
                        $userModel->setResetToken(null);
                        $userModel->setResetExpires(null);
                        $userModel->save();
                        $success[] = "Votre mot de passe a été réinitialisé avec succès.";

                    }
                }
            }
        }

        $myView = new View("Security/resetPassword", "neutral");

        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }




}
