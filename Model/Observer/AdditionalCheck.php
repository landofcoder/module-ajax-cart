<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/terms
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_Ajaxcart
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */
namespace Lof\Ajaxcart\Model\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class AdditionalCheck implements ObserverInterface
{
    /**
     * Ajax cart helper.
     *
     * @var \Lof\Ajaxcart\Helper\Data
     */
    private $helper;

    /**
     * Http request.
     *
     * @var \Magento\Framework\App\RequestInterface
     */
    private $request;

    /**
     * Initialize dependencies.
     *
     * @param \Lof\Ajaxcart\Helper\Data $helper
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Lof\Ajaxcart\Helper\Data $helper,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->helper = $helper;
        $this->request = $request;
    }

    /**
     * Check is show additional data in quick view.
     *
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        $layout = $observer->getLayout();
        $block = $layout->getBlock('product.info.details');
        if ($block && $this->request->getModuleName() == 'ajaxcart') {
            $isShow = $this->helper->isShowQuickviewAddData();

            if (!$isShow) {
                $layout->unsetElement('product.info.details');
            }
        }
    }
}