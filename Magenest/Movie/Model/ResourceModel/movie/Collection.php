<?php
namespace Magenest\Movie\Model\ResourceModel\movie;
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
        $this->_init('Magenest\Movie\Model\movie',
            'Magenest\Movie\Model\ResourceModel\movie');
    }
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->join(['movie' => $this->_resource->getTable('magenest_movie')], 'magenest_movie.movie_id = magenest_director.movie_id',);
        return $this;
    }
}
