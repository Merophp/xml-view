<?php

use Merophp\XmlViewPlugin\XmlView;
use PHPUnit\Framework\TestCase;

/**
 * @covers XmlView
 */
class XmlViewTest extends TestCase
{
    public function testAll()
    {
        $view = new XmlView;
        $view->xml(5);
        $this->assertEquals('5', $view->render());
        $view->xml(1.1);
        $this->assertEquals('1.1', $view->render());

        $this->assertEquals('text/xml;charset=utf-8', $view->getContentType());
    }
}
