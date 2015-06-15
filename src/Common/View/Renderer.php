<?php

namespace Common\View;

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
     * @param null|array $data
     * @param null|string $layout
     * @return null|string
     */
    public function render($view = null, array $data = [], $layout = null) {

        $returnData = null;

        $this->setData($data);
        $this->setView($view);
        $this->setLayout($layout);

        ob_start();

        if (file_exists($this->view)) {
            require_once $this->view;
        }

        if (file_exists($this->layout)) {
            $body = ob_get_clean();
            require_once $this->layout;
        }

        return ob_get_clean();
    }

    /**
     * @param null|string $partial
     * @param null|array $data
     * @return null|string
     */
    public function renderPartial($partial = null, array $data = []) {

        $partial = BASE_DIR            .
                   'protected'         .
                   DIRECTORY_SEPARATOR .
                   'views'             .
                    DIRECTORY_SEPARATOR .
                   $partial;

        ob_start();

        if (file_exists($partial) && is_file($partial)) {
            extract($data);
            require_once $partial;
        }

        return ob_get_clean();
    }

    /**
     * @param string $layout
     * @return Renderer
     */
    public function setLayout($layout) {

        $baseLayout    = BASE_DIR . $this->config['layouts']['base'];
        $layoutDirPath = BASE_DIR . $this->config['layouts']['path'];
        $layoutPath    = BASE_DIR . $layoutDirPath . DIRECTORY_SEPARATOR . $layout;

        if (file_exists($layout) && is_file($layout)) {
            $this->layout = $layout;
        } elseif (file_exists($layoutPath) && is_file($layoutPath)) {
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
        $viewPath  = BASE_DIR . $viewsPath . DIRECTORY_SEPARATOR . $view;

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