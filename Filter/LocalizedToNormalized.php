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
namespace Lof\Ajaxcart\Filter;

class LocalizedToNormalized extends \Magento\Framework\Filter\LocalizedToNormalized
{
    /**
     * Resolver.
     *
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    private $resolverInterface;

    /**
     * Initialize dependencies.
     *
     * @param \Magento\Framework\Locale\ResolverInterface $resolverInterface
     */
    public function __construct(
        \Magento\Framework\Locale\ResolverInterface $resolverInterface
    ) {
        parent::__construct();
        $this->resolverInterface = $resolverInterface;
    }

    /**
     * Filter local value.
     *
     * @param string $value
     * @return array|string
     * @throws \Zend_Locale_Exception
     */
    public function filter($value)
    {
        $this->_options = ['locale' => $this->resolverInterface->getLocale()];
        if (!isset($this->_options['date_format'])) {
            $this->_options['date_format'] = null;
        }

        if (\Zend_Locale_Format::isNumber($value, $this->_options)) {
            return \Zend_Locale_Format::getNumber($value, $this->_options);
        } elseif (($this->_options['date_format'] === null) && (strpos($value, ':') !== false)) {
            // Special case, no date format specified, detect time input
            return \Zend_Locale_Format::getTime($value, $this->_options);
        } elseif (\Zend_Locale_Format::checkDateFormat($value, $this->_options)) {
            // Detect date or time input
            return \Zend_Locale_Format::getDate($value, $this->_options);
        }

        return $value;
    }
}