<?php
namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class FrontendExercises extends Template
{
    private $_procutCollectFactory;

    public function __construct(
        Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
        $productCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->_procutCollectFactory = $productCollectionFactory;
    }
}
