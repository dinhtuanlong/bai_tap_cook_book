<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Framework\GraphQl\Exception;
use Magento\Backend\App\Action;
use Magenest\Movie\Model\MovieFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $movieFactory;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param movieFactory $movieFactory
     */
    public function __construct(
        Action\Context $context,
        MovieFactory $movieFactory
    ) {
        parent::__construct($context);
        $this->movieFactory = $movieFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['movie_id']) ? $data['movie_id'] : null;

        $newData = [
            'name' => $data['name'],
            'rating' => $data['rating'],
            'description' => $data['description'],
            'director_id' => $data['director_id'],
        ];

        $post = $this->movieFactory->create();

        if ($id) {
            $post->load($id);
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the post.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('movie/movie/index');
    }
}
