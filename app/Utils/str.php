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
 * @package QNZ\Utils
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


    /**
     * 栓测email格式
     * @param $address
     * @return bool
     */
    function valid_email($address) {
        // check an email address is possibly valid
        if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 文件大小格式化
     *
     * @param int $bytes
     * @return string
     */
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

  
}
?>
