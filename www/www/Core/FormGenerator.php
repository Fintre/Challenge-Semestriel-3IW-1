<?php

namespace App\Core;

class FormGenerator
{
    public static function generateForm($formClass)
    {
        $formConfig = $formClass->getConfig();

        $html = '<form method="' . $formConfig['config']['method'] . '" action="' . $formConfig['config']['action'] . '" class="' . $formConfig['config']['class'] . '">';

        foreach ($formConfig['inputs'] as $inputName => $inputConfig) {
            $html .= '<div class="form-group">&nbsp';
            $html .= '<label for="' . $inputName . '">' . ucfirst($inputName) . '</label>&nbsp';

            $html .= '<input type="' . $inputConfig['type'] . '" name="' . $inputName . '" class="' . $inputConfig['class'] . '" placeholder="' . $inputConfig['placeholder'] . '"';

            if (isset($inputConfig['minlen'])) {
                $html .= ' minlength="' . $inputConfig['minlen'] . '"';
            }

            if (isset($inputConfig['required']) && $inputConfig['required']) {
                $html .= ' required';
            }

            $html .= '>';

            $html .= '</div>';
        }

        $html .= '<br><input type="submit" value="' . $formConfig['config']['submit'] . '">';
        $html .= '</form>';

        echo $html;

    }
}
