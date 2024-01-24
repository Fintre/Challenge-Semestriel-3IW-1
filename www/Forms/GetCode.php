<?php

namespace App\Forms;

class GetCode
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
                "Code"=>["type"=>"text", "class"=>"input-form", "placeholder"=>"code de reinitialisation", "required"=>true, "error"=>"Votre code est incorrect"],
                "Enrégistrer"=>["type"=>"submit", "class"=>"form button button-primary", "value"=>"Enrégistrer", "placeholder"=>"Enrégistrer", "required"=>true]
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