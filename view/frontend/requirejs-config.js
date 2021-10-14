var config = {
	map: {
        '*': {
            lofAjaxcart: 'Lof_Ajaxcart/js/ajax',
            lofPopup: 'Lof_Ajaxcart/js/popup',
            lofGoto: 'Lof_Ajaxcart/js/goto',
            lofProductSuggest: 'Lof_Ajaxcart/js/suggest'
        }
    },
    config:{
    	mixins: {
         'Magento_ConfigurableProduct/js/configurable': {
               'Lof_Ajaxcart/js/mixin/configurable': true
           }
      }
  }
};