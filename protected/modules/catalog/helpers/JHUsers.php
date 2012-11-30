<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author AngryGantz Email: AngryGantz@gmail.com
 * @copyright 2012
 * @version 1.0
 * 
 */
class JHUsers extends YiiBase  {

    public static function isDealer(){
       if (Yii::app()->user->isGuest) return false;
       $a = Rights::getAssignedRoles();
       foreach($a as $v) if ($v->name=='Dealer') return true;
       return false;
    }
    
   public static function isAdmin(){
       if (Yii::app()->user->isGuest) return false;
       $a = Rights::getAssignedRoles();
       foreach($a as $v) if ($v->name=='admin') return true;
       return false;
    }

    
}  
?>
