<?php

namespace Kitpages\FileSystemBundle\Service;

/**
 * Holds references to all declared filesystems
 * and allows to access them through their name
 */
class FilesystemMap
{
    /**
     * Map of filesystems indexed by their name
     *
     * @var array
     */
    private $map;

    /**
     * Instanciates a new filesystem map
     *
     * @param array $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * @param string $name name of a filesystem
     * @throw \InvalidArgumentException if the filesystem does not exist
     * @return Filesystem
     */
    public function getAdapter($name)
    {
        if (!isset($this->map[$name])) {
            throw new \InvalidArgumentException(sprintf('No filesystem register for name "%s"', $name));
        }

        return $this->map[$name];
    }

    /**
     * return a list of filesystems with the name of the file system as the key and the adapter as the value (as
     * values defined in the config.yml)
     * @return array
     * @example : array("kitsiteTest" => $adapter1);
     */
    public function getAdapterList()
    {
        return $this->map;
    }
}
