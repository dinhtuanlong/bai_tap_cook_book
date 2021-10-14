<?php

namespace Magenest\Movie\Controller\movie;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $movieFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magenest\Movie\Model\movieFactory $movieFactory
    )
    {
        $this->movieFactory = $movieFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->movieFactory->create()->getCollection();
        foreach ($data as $value) {
            echo "<pre>";
            print_r($value->getData());
            echo "</pre>";
        }
    }
}
