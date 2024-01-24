<?php
namespace App\Forms;
class Connexion
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                        "method"=>"POST",
                        "action"=>"",
                        "submit"=>"Se connecter",
                        "class"=>"form",
                        "id"=>"form-login"
                     ],
            "inputs"=>[
                "email"=>["type"=>"email", "class"=>"input-form", "placeholder"=>"Email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "pwd"=>["type"=>"password", "class"=>"input-form", "placeholder"=>"Mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                ]
        ];
    }

    /*public function renderForm(): string
    {
        $formConfig = $this->getConfig();

        $formHtml = '<div>';
        $formHtml .= '<form method="' . $formConfig['config']['method'] . '" action="' . $formConfig['config']['action'] . '" class="' . $formConfig['config']['class'] . '">';

        foreach ($formConfig['inputs'] as $inputName => $inputConfig) {
            $formHtml .= '<input type="' . $inputConfig['type'] . '" class="' . $inputConfig['class'] . '" placeholder="' . $inputConfig['placeholder'] . '"';

            if ($inputConfig['required']) {
                $formHtml .= ' required';
            }

            $formHtml .= '>';
        }

        //$formHtml .= '<input type="submit" value="' . $formConfig['config']['submit'] . '">';
        $formHtml .= '</form>';
        $formHtml .= '</div>';

        return $formHtml;
    }*/

}
