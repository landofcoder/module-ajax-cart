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
namespace Lof\Ajaxcart\Block\Cart;

use Magento\Framework\View\Element\Template;

class Sidebar extends Template
{
   /**
    * @var \Lof\Jobs\Helper\Data
    */
   private $helper;

   private $scopeConfig;

   protected $jsLayout;
   protected $_storeManager;

   protected $localeCurrency;

   
   /**
    * Sidebar constructor.
    * @param Template\Context $context
    * @param \Lof\Jobs\Helper\Data $helper
    * @param array $data
    */
   public function __construct(
     Template\Context $context,

     \Lof\Ajaxcart\Helper\Data $helper,

     \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
     \Magento\Store\Model\StoreManagerInterface $storeManager,
     \Magento\Framework\Locale\CurrencyInterface $localeCurrency,


     array $data = []
   ) {
     parent::__construct($context, $data);
     $this->scopeConfig = $scopeConfig;
     $this->_storeManager = $storeManager;
     $this->localecurrency = $localeCurrency;
     $this->helper = $helper;
    // $this->jsLayout = array('test'=>1);
      // if (isset($data['jsLayout'])) {
      //     $this->jsLayout = array_merge_recursive($jsLayoutDataProvider->getData(), $data['jsLayout']);
      //     unset($data['jsLayout']);
      // } else {
      //     $this->jsLayout = $jsLayoutDataProvider->getData();
      // }
    $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
    $this->jsLayout['components']['minicart-addons']['config'] = array(
      'currency' => $this->getStoreCurrency(),
      'currencyCode' => $this->getCurrentCurrencyCode(),
      'shippingBar' => $this->getConfigForShippingBar(),
    );

   }
    /**
     * @return string
     */
    public function getJsLayout()
    {
            return \Zend_Json::encode($this->jsLayout);
    }
    public function getFreeShippingStatus()
    {
        return $this->scopeConfig->getValue('carriers/freeshipping/active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
   
   public function getStoreCurrency(){
    $currencycode = $this->_storeManager->getStore()->getCurrentCurrencyCode();
    return $this->localecurrency->getCurrency($currencycode)->getSymbol();
  }
     /**
     * Get current store currency code
     *
     * @return string
     */
     public function getCurrentCurrencyCode()
     {
      return $this->_storeManager->getStore()->getCurrentCurrencyCode();
    }    


    public function getConfigForShippingBar()
    {
     return $this->helper->getPriceForShippingBar();
   }


 }