<?php

namespace Common\View;

use \Slim\View as SlimViewRenderer;
use \Common\Config\Config;

class Renderer
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var \ArrayObject
     */
    private $data;

    /**
     * @var string
     */
    private $layout;

    /**
     * @var string
     */
    private $view;

    /**
     * Constructor of Renderer
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
        $this->data   = new \ArrayObject(
            [],
            \ArrayObject::STD_PROP_LIST
        );
    }

    /**
     * @param $param
     * @return mixed|null
     */
    public function __get($param) {

        $returnData = null;

        if (array_key_exists($param, $this->data)) {
            $returnData = $this->data[$param];
        }

        return $returnData;
    }

    /**
     * @param null|string $view
     * @param null|string $data
     * @param null|string $layout
     * @return null|string
     */
    public function render($view = null, $data = null, $layout = null) {

        $returnData = null;

        $this->setData($data);
        $this->setView($view);
        $this->setLayout($layout);

        if (file_exists($this->view)) {
            ob_start();
            require_once $this->view;
            $returnData = ob_get_clean();
            $this->set('view', $returnData);
        }

        if (file_exists($this->layout)) {
            ob_start();
            require_once $this->layout;
            $returnData = ob_get_clean();
        }

        return $returnData;
    }

    /**
     * @param string $layout
     * @return Renderer
     */
    public function setLayout($layout) {

        $baseLayout    = $this->config['views']['layout.base'];
        $layoutDirPath = $this->config['views']['layout.path'];
        $layoutPath    = $layoutDirPath . DIRECTORY_SEPARATOR . $layout;
        
        if (file_exists($layout)) {
            $this->layout = $layout;
        } elseif (file_exists($layoutPath)) {
            $this->layout = $layoutDirPath;
        } else {
            $this->layout = $baseLayout;
        }
        
        return $this;
    }

    /**
     * @param $view
     * @return Renderer
     */
    public function setView($view) {

        $viewsPath = $this->config['views']['path'];
        $viewPath  = $viewsPath . DIRECTORY_SEPARATOR . $view;

        if (file_exists($viewPath)) {
            $this->view = $viewPath;
        }

        return $this;
    }

    /**
     * @param array $data
     * @return Renderer
     */
    public function setData(array $data) {

        $this->data->exchangeArray($data);

        return $this;
    }

    /**
     * @param $name
     * @param $value
     * @return Renderer
     */
    public function set($name, $value) {

        $this->data[$name] = $value;

        return $this;
    }

    public function __toString() {
        return $this->render($this->view, $this->data, $this->layout);
    }
}