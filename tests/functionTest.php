<?php

use PHPUnit\Framework\TestCase;

final class functionTest extends TestCase
{
    /** @test */
    public function checkUserLogin() : void
    {
        
        require 'connect.php';
        require 'functions.php';

        $user_data = check_login($conn);
        
        $this->assertEquals(NULL , $user_data['user_id']);
        
    }
}