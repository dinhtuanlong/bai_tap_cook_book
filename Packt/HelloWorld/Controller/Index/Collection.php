<?php
namespace Packt\HelloWorld\Controller\Index;
class Collection extends \Magento\Framework\App\Action\Action {
    public function execute() {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image',
            ])
            //->addAttributeToFilter('name', 'Overnight Duffle')
            ->addAttributeToFilter('entity_id', array(
                'in' => array(150, 160, 161)
            ));
//            ->addAttributeToFilter('name', array(
//            'like' => '%Sport%'
//        ));
            //->setPageSize(10,1);
        //$output = $productCollection->getSelect()->__toString();
        //$this->getResponse()->setBody($output);
        $productCollection->setDataToAll('price', 20);
        //$productCollection->save();
        foreach ($productCollection as $product) {
            //$output .= \Zend_Debug::dump($product->debug(), null, false);
            echo "<pre>";
            print_r($product->getData());
            echo "</pre>";
        }
    }
}
