<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace Root\NamespaceBasic;

/**
 * Class ClassBasic
 * @package Root\NamespaceBasic
 */
if (!class_exists('Root\\NamespaceBasic\\ClassBasic')) {
    class ClassBasic
    {
        /**
         * ClassBasic constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public static function show()
        {
            return 'ClassBasic';
        }
    }
}
