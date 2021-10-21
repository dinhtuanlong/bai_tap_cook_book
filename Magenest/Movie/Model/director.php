<?php
namespace Magenest\Movie\Model;
class director extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = 'magenest_director_director';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\director');
    }
}



