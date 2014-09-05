<?php
namespace Oranges\framework;

/**
 * Provides global access to the Symfony2 'container' object.
 */
class MasterContainer
{
    public static $container;
    public static $isTesting = false;

    public static function getContainer()
    {
        return self::$container;
    }

    public static function get($str)
    {
        if (self::$isTesting && $str == "request")
            return null;

        return self::$container->get($str);
    }

    public static function getParameter($str)
    {
        if (self::$isTesting && $str == "request")
            return null;

        return self::$container->getParameter($str);
    }

    public static function hasParameter($str)
    {
        if (self::$isTesting && $str == "request")
            return false;

        if (!isset(self::$container))
            throw new \Exception("BAD");

        return self::$container->hasParameter($str);
    }
}
