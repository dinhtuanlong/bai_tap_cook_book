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
    public function joinMovie()
    {
        $actorTable = $this->getTable('magenest_actor');
        $movieactorTable = $this->getTable('magenest_movie_actor');
        $directorTable = $this->getTable('magenest_director');
        $result=$this
            ->addFieldToSelect('name','movie')
            ->addFieldToSelect('description')
            ->addFieldToSelect('rating')
            ->join($directorTable,
                'main_table.director_id='.$directorTable.'.director_id',
                ['director' => 'name'])
            ->join($movieactorTable,
                'main_table.movie_id='.$movieactorTable.'.movie_id',
                null)
            ->join($actorTable,
                $actorTable.'.actor_id='.$movieactorTable.'.actor_id',
                ['actor' => 'name']);
        return $result->getSelect();
    }
}
