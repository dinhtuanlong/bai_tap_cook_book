<?php
namespace Magenest\Movie\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Button extends Field
{
    /**
     * Get the button Run
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return '<button onClick="window.location.reload();">Refresh Page</button>';
    }
}
