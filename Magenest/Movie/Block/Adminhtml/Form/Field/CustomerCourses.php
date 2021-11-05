<?php
namespace Magenest\Movie\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Magenest\Movie\Block\Adminhtml\Form\Field\CustomerGroupColumn;
use Magenest\Movie\Block\Adminhtml\Form\Field\TimeColumn;

/**
 * Class CustomerCourses
 */
class CustomerCourses extends AbstractFieldArray
{
    private $timeRenderer;
    private $customerRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('customer_group', ['label' => __('Customer Group'), 'class' => 'required-entry']);
        $this->addColumn('customer_group', [
            'label' => __('Customer Group'),
            'renderer' => $this->getCustomerRenderer()
        ]);
        $this->addColumn('time_course', [
            'label' => __('Time Course setting'),
            'renderer' => $this->getTimeRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $time = $row->getTime();
        if ($time !== null) {
            $options['option_' . $this->getTimeRenderer()->calcOptionHash($time)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * @return TaxColumn
     * @throws LocalizedException
     */
    private function getTimeRenderer()
    {
        if (!$this->timeRenderer) {
            $this->timeRenderer = $this->getLayout()->createBlock(
                TimeColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->timeRenderer;
    }
    private function getCustomerRenderer()
    {
        if (!$this->customerRenderer) {
            $this->customerRenderer = $this->getLayout()->createBlock(
                CustomerGroupColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerRenderer;
    }
}
