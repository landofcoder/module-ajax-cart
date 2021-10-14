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
namespace Lof\Ajaxcart\Model\Config\Source;

class Countdown implements \Magento\Framework\Option\ArrayInterface
{
    const POPUP_COUNTDOWN_DISABLED = 0;
    const POPUP_COUNTDOWN_CONTINUE_BTN = 1;
    const POPUP_COUNTDOWN_VIEW_CART_BTN = 2;

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return  [
            ['value' => self::POPUP_COUNTDOWN_DISABLED, 'label' => __('No')],
            ['value' => self::POPUP_COUNTDOWN_CONTINUE_BTN, 'label' => __('Continue button')],
            ['value' => self::POPUP_COUNTDOWN_VIEW_CART_BTN, 'label' => __('View Cart button')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::POPUP_COUNTDOWN_DISABLED => __('No'),
            self::POPUP_COUNTDOWN_CONTINUE_BTN => __('Continue button'),
            self::POPUP_COUNTDOWN_VIEW_CART_BTN => __('View Cart button')
        ];
    }
}