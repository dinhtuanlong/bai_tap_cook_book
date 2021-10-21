<?php
namespace Magenest\Movie\Model\ResourceModel\director;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\director', 'Magenest\Movie\Model\ResourceModel\director');
    }
}
