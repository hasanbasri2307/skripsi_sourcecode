<?php
/**
 * Created by PhpStorm.
 * User: Hasan Basri
 * Date: 11/7/2014
 * Time: 15:45
 */

class Document extends Eloquent {

    protected $table = 'document';
    protected $primaryKey = 'id_doc';
    public $timestamps = false;

}