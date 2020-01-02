<?php 
/**
 * QNZ Utils
 *
 * This file is part of the QNZ CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Utils
 * @license    MIT
 * @copyright  Copyright (C) heiniaozhi.cn, All rights reserved.
 * @link       https://github.com/QNZ/Utils
 * @author     doubletong <twotong@gmail.com>
 */
namespace QNZ\Utils;

/**
 * Class Str
 *
 * @package JBZoo\Utils
 */
class Str
{

    //
     /**
     * Checks if the $haystack starts with the text in the $needle.
     *
     * @param string $haystack
     * @param string $needle    
     * @return bool
     */
    public static function startsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

   /**
     * Checks if the $haystack ends with the text in the $needle. Case sensitive.
     *
     * @param string $haystack
     * @param string $needle  
     * @return bool
     */
    public static function endsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

  
}
?>
