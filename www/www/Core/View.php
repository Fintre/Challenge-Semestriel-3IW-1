<?php
namespace App\Core;

require_once __DIR__."/../Shared/scssphp-1.12.0/scss.inc.php";

use ScssPhp\ScssPhp\Compiler;

class View
{
    private String $templateName;
    private String $viewName;
    private String $css;

    public function __construct(string $viewName, string $templateName = "front")
    {
        $compiler = new Compiler();
        $outputCss = $compiler->compileFile('Views/CSS/main.scss')->getCss();
        $this->setCss($outputCss);
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

    public function setCss(string $css): void
    {
        $this->css = $css;
    }

    public function __destruct()
    {
        include $this->templateName;
    }

}