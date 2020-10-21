<?php

namespace AhmedElsadany\CmsSetting\Models;
use Elsayednofal\Imagemanager\Http\Controllers\Facades\ImageManager;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of CmsBackendUser
 *
 * @author Ahmed Sadany
 */
class CmsSetting extends Model {

    protected $table = 'cms_settings';
    function getSettingValueAttribute(){
        if($this->type==1){
         return '<img class="img-circle" src="'.ImageManager::getImagePath($this->value,'small').'" height="70px" width="70px">' ;  
        }
        else{
           return $this->value;
        }
    }
     function getDisplayValueAttribute(){
        if($this->type==1){
         return ImageManager::getImagePath($this->value,'') ;  
        }
        else{
           return $this->value;
        }
    }
}