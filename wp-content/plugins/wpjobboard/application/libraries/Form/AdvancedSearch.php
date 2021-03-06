<?php
/**
 * Description of AdvancedSearch
 *
 * @author greg
 * @package 
 */

class Wpjb_Form_AdvancedSearch extends Daq_Form_Abstract
{
    protected $_custom = "wpjb_form_job_search";
    
    public function init()
    {
        global $wp_rewrite;

        $this->addGroup("_internal");
        $this->addGroup("search", "");
        
        if(!$wp_rewrite->using_permalinks()) {
            $e = $this->create("job_board", "hidden");
            $e->setValue("find");
            $this->addElement($e, "_internal");

            $e = $this->create("page_id", "hidden");
            $e->setValue(Wpjb_Project::getInstance()->conf("link_jobs"));
            $this->addElement($e, "_internal");
        }

        $e = $this->create("query");
        $e->setLabel(__("Keyword", "wpjobboard"));
        $this->addElement($e, "search");
        
        $e = $this->create("location");
        $e->setLabel(__("Location", "wpjobboard"));
        $this->addElement($e, "search");
        
        $e = $this->create("radius", "select");
        $e->setLabel(__("Radius", "wpjobboard"));
        $e->setEmptyOption(true);
        $e->addOption("5 km", "5 km", "5 km");
        $e->addOption("10 km", "10 km", "10 km");
        $e->addOption("25 km", "25 km", "25 km");
        $e->addOption("50 km", "50 km", "50 km");
        $e->addOption("100 km", "100 km", "100 km");
        $e->addOption("200 km", "200 km", "200 km");
        $e->addOption("500 km", "500 km", "500 km");
        $e->setTrashed(true);
        $e->setBuiltin(false);
        $this->addElement($e, "search"); 
        
        $e = $this->create("type", "select");
        $e->setLabel(__("Job Type", "wpjobboard"));
        $e->setEmptyOption(true);
        foreach(Wpjb_Utility_Registry::getJobTypes() as $obj) {
            $e->addOption($obj->id, $obj->id, $obj->title);
        }
        if(count(Wpjb_Utility_Registry::getJobTypes()) > 0) {
            $this->addElement($e, "search");
        }

        $e = $this->create("category", "select");
        $e->setLabel(__("Job Category", "wpjobboard"));
        $e->setEmptyOption(true);
        foreach(Wpjb_Utility_Registry::getCategories() as $obj) {
            $e->addOption($obj->id, $obj->id, $obj->title);
        }
        if(count(Wpjb_Utility_Registry::getCategories()) > 0) {
            $this->addElement($e, "search");
        }

        $e = $this->create("posted", "select");
        $e->setLabel(__("Posted", "wpjobboard"));
        $e->addOption(null, null, " ");
        $e->addOption(1, 1, __("Today", "wpjobboard"));
        $e->addOption(2, 2, __("Since Yesterday", "wpjobboard"));
        $e->addOption(7, 7, __("Less than 7 days ago", "wpjobboard"));
        $e->addOption(30, 30, __("Less than 30 days ago", "wpjobboard"));
        $this->addElement($e, "search"); 

        add_filter("wpjb_form_init_search", array($this, "customFields"), 9);
        apply_filters("wpjb_form_init_search", $this);

    }
    
    public function customFields()
    {
        if(empty($this->_custom)) {
            return $this;
        }
        
        $this->loadGroups();
        
        if(!isset($this->fieldset["_trashed"])) {
            $this->addGroup("_trashed");
        }
        
        $key = "job";
        $list = array(
            "ui-input-text" => "text",
            "ui-input-radio" => "radio",
            "ui-input-checkbox" => "checkbox",
            "ui-input-select" => "select",
            "ui-input-file" => "file",
            "ui-input-textarea" => "textarea",
            "ui-input-hidden" => "hidden",
            "ui-input-password" => "password",
        );
        
        $query = Daq_Db_Query::create();
        $query->from("Wpjb_Model_Meta t");
        $query->where("meta_object = ?", $key);
        $query->where("meta_type = 3");
        $row = $query->execute();
        
        foreach($row as $meta) {
            $data = unserialize($meta->meta_value);
            $data["is_trashed"] = true;
            $data["group"] = "_trahsed";
            if($this->_upload) {
                $data["upload_path"] = $this->_upload;
            }
            
            $tag = $list[$data["type"]];
            
            if(in_array($tag, array("hidden", "file"))) {
                continue;
            } elseif($tag == "textarea") {
                $tag = "text";
            }
            
            if($this->hasElement($meta->name)) {
                continue;
            }
            
            $e = $this->create("$meta->name", $tag);
            $e->overload($data);
            $e->setBuiltin(false);
            $e->setTrashed(true);
            $e->setRequired(false);
            $this->addElement($e, "_trashed");

        }
        
        return $this;
    }
}

?>