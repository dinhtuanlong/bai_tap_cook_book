<?php
namespace Magenest\Movie\Observer;

use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use \Psr\Log\LoggerInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Framework\App\Cache\TypeListInterface;

class SaveImg implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;

    public function __construct(
        LoggerInterface $logger,
        ScopeConfigInterface $scopeConfig,
        WriterInterface $configWriter,
        CustomerFactory $customerFactory,
        TypeListInterface $cacheTypeList
    ){
        $this->logger = $logger;
        $this->_scopeConfig = $scopeConfig;
        $this->configWriter = $configWriter;
        $this->_cacheTypeList = $cacheTypeList;
        $this->customerFactory = $customerFactory;
    }
    public function execute(Observer $observer)
    {
        $getCustomer = $observer->getEvent()->getData('customer');
//        $ava = $getCustomer->getData('avatar_url');
//        try {
//            $om = \Magento\Framework\App\ObjectManager::getInstance();
//            $filesystem = $om->get('Magento\Framework\Filesystem');
//            $directoryList = $om->get('Magento\Framework\App\Filesystem\DirectoryList');
//            $media = $filesystem->getDirectoryWrite($directoryList::MEDIA);
//            $contents = $ava;
//            $media->writeFile("view/frontend/web/images",$contents);
//        } catch(Exception $e) {
//            echo $e->getMessage();
//        }
    }
}
