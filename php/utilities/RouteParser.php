<?php

class RouteParser
{
    protected $Route;

    protected $basePath;
    protected $siteDir;
    protected $request;
    protected $pagePath;
    protected $codePath;
    protected $resourcePath;

    public function __construct($type = "view")
    {
        $this->siteDir = $_SERVER['DOCUMENT_ROOT'];
        $this->request = $_SERVER['REDIRECT_URL'];

        switch (strtolower($type)) {
            case "view":
                $this->basePath = "/pages";
                $this->ValidateRoute();
                break;
            case "api":
                $this->basePath = "/api";
                $this->ValidateAPIRoute();
                break;
            default:
                throw new Exception("Invalid RouteParser Type");
                break;
        }
    }

    protected function ValidateRoute()
    {
        if (preg_match("~^/$~", $this->request)) {
            $this->resourcePath = "/index";
            return;
        }
        if (preg_match("~/category/create$~", $this->request)) {
            $this->resourcePath = "/category/create";
            return;
        }


        if (preg_match("~^/category/(\d+)/summary$~", $this->request)) {
            $this->resourcePath = "/category/summary";
            return;
        }
        if (preg_match("~^/category/(\d+)/edit$~", $this->request)) {
            $this->resourcePath = "/category/edit";
            return;
        }
        if (preg_match("~^/category/(\d+)/delete$~", $this->request)) {
            $this->resourcePath = "/category/delete";
            return;
        }

        /* index */
        if (preg_match("~^/category/(\d+)/location$~", $this->request)) {
            $this->resourcePath = "/location/index";
            return;
        }

        /* create */
        if (preg_match("~^/category/(\d+)/location/create$~", $this->request)) {
            $this->resourcePath = "/location/create";
            return;
        }

        /* edit */
        if (preg_match("~^/category/(\d+)/location/(\d+)/edit$~", $this->request)) {
            $this->resourcePath = "/location/edit";
            return;
        }

        /* delete */
        if (preg_match("~^/category/(\d+)/location/(\d+)/delete$~", $this->request)) {
            $this->resourcePath = "/location/delete";
            return;
        }


        /* basic */
        if (preg_match("~^/error$~", $this->request)) {
            $this->resourcePath = "/error";
            return;
        }
        if (preg_match("~^/unauthorized$~", $this->request)) {
            $this->resourcePath = "/unauthorized";
            return;
        }
    }

    protected function ValidateAPIRoute()
    {
        if (preg_match("~^/api/category$~", $this->request)) {
            $this->resourcePath = "/category";
            return;
        }
        if (preg_match("~^/api/category/(\d+)$~", $this->request)) {
            $this->resourcePath = "/category";
            return;
        }

        if (preg_match("~^/api/category/(\d+)/location$~", $this->request)) {
            $this->resourcePath = "/location";
            return;
        }
        if (preg_match("~^/api/category/(\d+)/location/(\d+)$~", $this->request)) {
            $this->resourcePath = "/location";
            return;
        }
    }

    function Request()
    {
        return $this->request;
    }
    function PagePath()
    {
        if ($this->resourcePath == "")
            return "";
        return $this->siteDir . $this->basePath . $this->resourcePath . ".php";
    }
    function CodePath()
    {
        if ($this->resourcePath == "")
            return "";
        return $this->siteDir . $this->basePath . $this->resourcePath . ".code.php";;
    }
    function CSS()
    {
        if ($this->resourcePath == "")
            return "";
        return $this->basePath . $this->resourcePath . ".php.css";
    }
    function JS()
    {
        if ($this->resourcePath == "")
            return "";
        return $this->basePath . $this->resourcePath . ".php.js";
    }
    function ResourcePath()
    {
        return $this->resourcePath;
    }
    function Page404()
    {
        return $this->siteDir . $this->basePath . "/404.php";
    }
}
