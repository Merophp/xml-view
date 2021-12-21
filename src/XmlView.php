<?php
declare(strict_types=1);

namespace Merophp\XmlViewPlugin;

use DOMDocument;
use Exception;
use Merophp\ViewEngine\ViewInterface;

class XmlView implements ViewInterface{

    /**
     * @var DOMDocument
     */
    protected DOMDocument $domDocument;

    /**
     * @var string
     */
    protected string $contentType = 'text/xml;charset=utf-8';

    /**
     * @return false|string
     */
    public function render(): string
    {
        ob_start();
        echo $this->domDocument->saveXML();
        $result=ob_get_contents();
        ob_end_clean();
        return $result;
    }


    /**
     * @param string|DOMDocument $value
     * @throws Exception
     * @api
     */
    public function xml($value)
    {
        if($value instanceof DOMDocument){
            $this->domDocument = $value;
        }
        else{
            $this->domDocument = new DOMDocument;
            if(!$this->domDocument->loadXML($value))
                throw new Exception('Invalid XML!');
        }
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }
}
