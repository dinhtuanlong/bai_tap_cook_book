<?php
namespace Magenest\Movie\Model;

class actor extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = 'magenest_actor_actor';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\actor');
    }
}
