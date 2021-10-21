<?php
namespace Magenest\Movie\Model\ResourceModel\actor;
/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct() {
        $this->_init('Magenest\Movie\Model\actor',
            'Magenest\Movie\Model\ResourceModel\actor');
    }
}
