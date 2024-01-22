<?php

namespace App\Forms;

class EditUser
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"",
                //"submit"=>"Modifier",
                "class"=>"form"
            ],

            /*"labels"=>[
                "Pseudo"=>["text" => "Pseudo"],
                "email"=>["text" => "email"],
                "Mot de passe"=>["text" => "Mot de passe"],
            ],*/
            "inputs"=>[
                "Pseudo"=>["label" => "Pseudo", "type"=>"text", "class"=>"input-form no-border" , "placeholder"=>"pseudo", "minlen"=>2, "required"=>true, "error"=>"Le login doit faire plus de 2 caractères"],
                "email"=>["label" => "email", "type"=>"email", "class"=>"input-form no-border", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "password"=>["label" => "mot de passe", "type"=>"password", "class"=>"input-form no-border", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "Modifier"=>["type"=>"submit", "class"=>"form button button-primary", "value"=>"Modifier", "placeholder"=>"Modifier", "required"=>true]
            ]

        ];
    }

    public function renderForm(): string
    {
        $formConfig = $this->getConfig();

        $formHtml = '<div>';
        $formHtml .= '<form method="' . $formConfig['config']['method'] . '" action="' . $formConfig['config']['action'] . '" class="' . $formConfig['config']['class'] . '">';

        foreach ($formConfig['inputs'] as $fieldName => $fieldConfig) {
            $formHtml .= '<div>';

            if (isset($fieldConfig['label'])) {
                $formHtml .= '<label for="' . $fieldName . '">' . $fieldConfig['label'] . '</label>';
            }

            if ($fieldConfig['type'] === 'submit') {
                $formHtml .= '<input type="submit" class="' . $fieldConfig['class'] . '" value="' . $fieldConfig['value'] . '" style="width: auto;">';
            } else {
                $formHtml .= '<input type="' . $fieldConfig['type'] . '" class="' . $fieldConfig['class'] . '" placeholder="' . $fieldConfig['placeholder'] . '"';

                if ($fieldConfig['required']) {
                    $formHtml .= ' required';
                }

                if (isset($fieldConfig['value'])) {
                    $formHtml .= ' value="' . $fieldConfig['value'] . '"';
                }

                $formHtml .= '>';
            }

            $formHtml .= '</div>';
        }

        //$formHtml .= '<input type="submit" value="' . $formConfig['config']['submit'] . '">';
        $formHtml .= '</form>';
        $formHtml .= '</div>';

        return $formHtml;
    }

}