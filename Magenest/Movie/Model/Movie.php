<?php
namespace Magenest\Movie\Model;
class Movie extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = 'magenest_Movie_movie';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Movie');
    }
}



