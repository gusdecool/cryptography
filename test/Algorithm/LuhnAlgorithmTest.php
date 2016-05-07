<?php

namespace GusDeCooL\Cryptography\Test\Algorithm;

use GusDeCooL\Cryptography\Algorithm\LuhnAlgorithm;

class LuhnAlgorithmTest extends \PHPUnit_Framework_TestCase
{

    #----------------------------------------------------------------------------------------------
    # Properties
    #----------------------------------------------------------------------------------------------

    /**
     * @var LuhnAlgorithm
     */
    private $algorithm;

    #----------------------------------------------------------------------------------------------
    # Setup
    #----------------------------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->algorithm = new LuhnAlgorithm();
    }

    #----------------------------------------------------------------------------------------------
    # Public methods
    #----------------------------------------------------------------------------------------------

    /**
     * @group unit
     */
    public function testIsAmex()
    {
        $this->assertTrue($this->algorithm->isValid('4408041234567893'));
        $this->assertFalse($this->algorithm->isValid('4417123456789112'));
        
        $this->assertFalse($this->algorithm->isValid('79927398710'));
        $this->assertFalse($this->algorithm->isValid('79927398711'));
        $this->assertFalse($this->algorithm->isValid('79927398712'));
        $this->assertTrue($this->algorithm->isValid('79927398713'));
        $this->assertFalse($this->algorithm->isValid('79927398714'));
        $this->assertFalse($this->algorithm->isValid('79927398715'));
        $this->assertFalse($this->algorithm->isValid('79927398716'));
        
        $this->assertTrue($this->algorithm->isValid('4027599893556649'));
        $this->assertTrue($this->algorithm->isValid('5286634662696236'));
        $this->assertTrue($this->algorithm->isValid('343535810456377'));
        $this->assertTrue($this->algorithm->isValid('5543694884910699'));
    }
}
