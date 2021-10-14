<?php
namespace Magenest\Movie\Model;
class movie extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = 'magenest_movie_movie';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Movie');
    }
}



