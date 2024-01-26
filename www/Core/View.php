<?php
namespace App\Core;


class View
{
    private String $templateName;
    private String $viewName;
    //private String $data;

    public function __construct(string $viewName, string $templateName = "back", mixed $data = null)
    {
        //check data nullity
        //$this->data=$data;
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
    }

    /**
     * @param String $templateName
     */
    public function setTemplateName(string $templateName): void
    {
        if(!file_exists("Views/components/Templates/".$templateName.".tpl.php"))
        {
            die("Le template Views/components/Templates/".$templateName.".tpl.php n'existe pas");
        }
        $this->templateName = "Views/components/Templates/".$templateName.".tpl.php";
    }

    /**
     * @param String $viewName
     */
    public function setViewName(string $viewName): void
    {
        if(!file_exists("Views/components/".$viewName.".view.php"))
        {
            die("La vue Views/components/".$viewName.".view.php n'existe pas");
        }
        $this->viewName = "Views/components/".$viewName.".view.php";
    }

    public function includeComponent(string $component, array $config, array $data = []): void
    {
        if(!file_exists("Views/Components/".$component.".php"))
        {
            die("Le composant Views/Components/".$component.".php n'existe pas");
        }
        include "Views/Components/".$component.".php";
    }

    public function __destruct()
    {
        include $this->templateName;
    }

}