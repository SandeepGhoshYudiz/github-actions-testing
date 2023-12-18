<?php
class FunctionsTest extends WP_UnitTestCase
{
    public function test_add_numbers()
    {
        $result = add_numbers(2, 3);
        $this->assertEquals(5, $result);
    }
}
