<?php
namespace Magenest\Movie\Block;
use Magento\Framework\View\Element\Template;
class Showtable extends Template
{
    private $_movieCollectionFactory;
    public function __construct(Template\Context $context, \Magenest\Movie\Model\ResourceModel\movie\CollectionFactory $movieCollectionFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_movieCollectionFactory = $movieCollectionFactory;
    }
    public function getMovies() {
        $movie = $this->_movieCollectionFactory->create();
        $movie->joinMovie();
        return $movie;
    }
}

