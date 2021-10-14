<?php
namespace Magenest\Movie\Block;
use Magento\Framework\View\Element\Template;
class Showtable extends Template
{
    private $_movieCollectFactory;
    public function __construct(Template\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $movieCollectFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->movieCollectFactory = $_movieCollectFactory;
    }
    public function getMovie() {
        $collection = $this->_movieCollectFactory->_initSelect();
        return $collection;
    }
}
