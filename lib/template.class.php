<?php

class Template 
{
    protected $file;
    protected $data;

    public function __construct($file)
        {
        if (is_file($file))
            $this->file = $file;
        else
            throw new Exception("File not found");
        $this->data = array();
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data))
        {
            return $this->data[$name];
        }
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __toString()
    {
        ob_start();
        $cwd = getcwd();
        chdir(dirname($this->file));
        include basename($this->file);
        chdir($cwd);
        return ob_get_clean();
    }
}