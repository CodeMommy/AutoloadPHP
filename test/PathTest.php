<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

namespace Test;

require_once(__DIR__ . '/../private/Path.php');

use PHPUnit\Framework\TestCase;
use NotPublic\Path;

/**
 * Class PathTest
 * @package Test
 */
class PathTest extends TestCase
{
    /**
     * Test Remove First Slash
     * @return void
     */
    public function testRemoveFirstSlash()
    {
        $string = '/\\CodeMommy';
        Path::removeFirstSlash($string);
        $this->assertEquals($string, 'CodeMommy');
    }

    /**
     * Test Remove Last Slash
     * @return void
     */
    public function testRemoveLastSlash()
    {
        $string = 'CodeMommy/\\';
        Path::removeLastSlash($string);
        $this->assertEquals($string, 'CodeMommy');
    }

    /**
     * Test Replace Slash
     * @return void
     */
    public function testReplaceSlash()
    {
        $string = '/CodeMommy\\';
        Path::replaceSlash($string);
        $this->assertEquals($string, DIRECTORY_SEPARATOR . 'CodeMommy' . DIRECTORY_SEPARATOR);
    }
}