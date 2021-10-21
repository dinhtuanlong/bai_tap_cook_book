<?php
namespace Magenest\Movie\Block\System\Config\Form\Field;

class MagenestMovie extends \Magento\Config\Block\System\Config\Form\Field
{
    private $_movieCollection;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\movie\Collection $movieCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_movieCollection = $movieCollection;
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $value = $this->_movieCollection->count();
        $element->setReadonly(true);
        $html = $element->getElementHtml();
        $html .= '<script type="text/javascript">
        require(["jquery"], function($) {
            $(document).ready(function(e) {
                $("#'.$element->getHtmlId().'").val('.$value.');
            });
        });
        </script>';
        return $html;
    }
}
