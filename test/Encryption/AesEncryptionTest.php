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
    public function testEncryptDecrypt()
    {
        $encrypt_word = 'alpha';
        $encrypted = $this->encryption->encrypt($encrypt_word);
        $this->assertEquals($encrypt_word, $this->encryption->decrypt($encrypted));
    }
}
