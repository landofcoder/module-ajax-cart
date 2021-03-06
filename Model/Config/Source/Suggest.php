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

class Suggest implements \Magento\Framework\Option\ArrayInterface
{
    const SUGGEST_SOURCE_RELATED = 0;
    const SUGGEST_SOURCE_UPSELL = 1;
    const SUGGEST_SOURCE_XSELL = 2;

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return  [
            ['value' => self::SUGGEST_SOURCE_RELATED, 'label' => __('Related Products')],
            ['value' => self::SUGGEST_SOURCE_UPSELL, 'label' => __('Up-Sell Products')],
            ['value' => self::SUGGEST_SOURCE_XSELL, 'label' => __('Cross-Sell Products')]
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
            self::SUGGEST_SOURCE_RELATED => __('Related Products'),
            self::SUGGEST_SOURCE_UPSELL => __('Up-Sell Products'),
            self::SUGGEST_SOURCE_XSELL => __('Cross-Sell Products')
        ];
    }
}