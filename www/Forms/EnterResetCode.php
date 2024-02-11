<?php
namespace App\Forms;

class EnterResetCode
{
    public function getConfig(): array
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => "enterResetCode",
                "submit" => "Valider code",
                "class" => "form",
                "id" => "form-enter-reset-code"
            ],
            "inputs" => [
                "Code" => ["type" => "text", "name" => "reset_code", "class" => "input-form", "placeholder" => "Code de réinitialisation", "required" => true, "error" => "Code incorrect"],
            ]
        ];
    }
}
