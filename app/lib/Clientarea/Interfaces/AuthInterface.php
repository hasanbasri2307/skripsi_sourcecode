<?php
/**
 * Created by PhpStorm.
 * User: Hasan Basri
 * Date: 11/3/2014
 * Time: 22:23
 */
namespace Clientarea\Interfaces;

interface AuthInterface {
    public function doLogin();
    public function doLogout();
}