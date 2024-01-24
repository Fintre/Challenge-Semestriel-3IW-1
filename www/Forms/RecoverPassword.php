<?php

namespace App\Forms;

class RecoverPassword
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"",
                //"submit"=>"Connexion",
                "class"=>"form"
            ],
            "inputs"=>[
                "email"=>["type"=>"email", "class"=>"input-form", "placeholder"=>"email", "required"=>true, "error"=>"Votre email est incorrect"],
                "Connexion"=>["type"=>"submit", "class"=>"form button button-primary", "value"=>"Connexion", "placeholder"=>"Connexion", "required"=>true]
            ]
        ];
    }

    public function renderForm(): string
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
    }
}