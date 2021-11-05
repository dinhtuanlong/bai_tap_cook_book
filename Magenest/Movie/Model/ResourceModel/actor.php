<?php
namespace Magenest\Movie\Model\ResourceModel;

class actor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }
    public function _construct()
    {
        $this->_init('magenest_actor', 'actor_id');
    }
}
