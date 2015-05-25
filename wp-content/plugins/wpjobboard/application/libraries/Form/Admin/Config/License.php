<?php
/**
 * Description of Frontend
 *
 * @author greg
 * @package
 */

class Wpjb_Form_Admin_Config_License extends Daq_Form_Abstract
{
    public $name = null;

    public function init()
    {
        $this->name = __("License Configuration", "wpjobboard");
        $instance = Wpjb_Project::getInstance();

        $e = $this->create("license_key");
        $e->setValue($instance->getConfig("license_key"));
        $e->setLabel(__("License Key", "wpjobboard"));
        $e->addValidator(new Wpjb_Validate_License);
        $this->addElement($e);
        
        $e = $this->create("license_site_type", "select");
        $e->setRequired();
        $e->setValue($instance->getConfig("license_site_type"));
        $e->setLabel(__("Site Type", "wpjobboard"));
        $e->addOption(null, null, "");
        $e->addOption(1, 1, __("Test / Development"));
        $e->addOption(2, 2, __("Final"));
        $this->addElement($e);
        
        $e = $this->create("license_usage_data", "checkbox");
        $e->setValue($instance->getConfig("license_usage_data"));
        $e->setLabel("");
        $e->addOption(1, 1, __("Send anonymous usage data (this will help improve WPJobBoard).", "wpjobboard"));
        $e->addFilter(new Daq_Filter_Int());
        $this->addElement($e);
        
        apply_filters("wpja_form_init_config_indeed", $this);

    }
    
    public function executePostSave($controller)
    {
        $manager = new Wpjb_Upgrade_Manager(Wpjb_Project::VERSION);
        $request = $manager->remote("activate", array(
            "license" => wpjb_conf("license_key"), 
            "site_type" => wpjb_conf("license_site_type")
        ));

        if(isset($request->result) && $request->result == 1) {
            $controller->view->_flash->addInfo(__("License activated successfully.", "wpjobboard"));
        }
    }
}

?>