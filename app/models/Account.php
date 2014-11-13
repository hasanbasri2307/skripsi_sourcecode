<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Account extends Eloquent {
    protected $table = 'account';
    protected $primaryKey = 'id_account';
      public $timestamps = false;
    
}