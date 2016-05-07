<?php

namespace GusDeCooL\Cryptography\Test\Encryption;

use GusDeCooL\Cryptography\Encryption\AesEncryption;

class AesEncryptionTest extends \PHPUnit_Framework_TestCase
{

    #----------------------------------------------------------------------------------------------
    # Properties
    #----------------------------------------------------------------------------------------------

    /**
     * @var AesEncryption
     */
    private $encryption;

    #----------------------------------------------------------------------------------------------
    # Setup
    #----------------------------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->encryption = new AesEncryption('test');
    }

    #----------------------------------------------------------------------------------------------
    # Public methods
    #----------------------------------------------------------------------------------------------

    /**
     * @group unit
     */
    public function testEncrypt()
    {
        $this->assertEquals('+P24cXIcklfKOHOuFRkIE3WprB6W11NRZnzg8SJRGoM=', $this->encryption->encrypt('alpha'));
    }

    /**
     * @group unit
     */
    public function testDecrypt()
    {
        $this->assertEquals('alpha', $this->encryption->decrypt('+P24cXIcklfKOHOuFRkIE3WprB6W11NRZnzg8SJRGoM='));
    }
}
