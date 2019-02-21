<?php
namespace Kalaweit\Core;

/**
 * Autoloader standard PSR4
 */
class Autoloader
{

    /**
     * Namespaces enregistrés
     * @var array
     */
    protected $prefixes = array();

    /**
     * Enregistrement du loader via le spl de PHP
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Ajout d'un espace de nom
     *
     * @param string  $prefix
     * @param string  $base_dir
     * @param boolean $prepend
     *
     * @return \Kalaweit\Core\Autoloader
     */
    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        $prefix   = trim($prefix, '\\') . '\\';
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
        return $this;
    }

    /**
     * Chargement de la classe (méthode spl)
     *
     * @param string $class
     *
     * @return mixed
     */
    public function loadClass($class)
    {
        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix         = substr($class, 0, $pos + 1);
            $relative_class = substr($class, $pos + 1);
            $mapped_file    = $this->loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }
            $prefix = rtrim($prefix, '\\');
        }
        return false;
    }

    /**
     * Chargement de la classe (map)
     *
     * @param string $prefix
     * @param string $relative_class
     *
     * @return mixed
     */
    protected function loadMappedFile($prefix, $relative_class)
    {
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }
        foreach ($this->prefixes[$prefix] as $base_dir) {
            $file = $base_dir
                  . str_replace('\\', '/', $relative_class)
                  . '.php';
            if ($this->requireFile($file)) {
                return $file;
            }
        }
        return false;
    }

    /**
     * Require
     *
     * @param string $file
     *
     * @return boolean
     */
    protected function requireFile($file)
    {
        if (file_exists($file)) {
            include $file;
            return true;
        }
        return false;
    }
}
