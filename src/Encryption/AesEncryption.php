<?php

namespace GusDeCooL\Cryptography\Encryption;

/**
 * Class AesEncryption
 *
 * @package GusDeCooL\Cryptography\Encryption\AesEncryption
 * @author GusDeCooL <gusdecool@gmail.com>
 */
class AesEncryption
{

    #------------------------------------------------------------------------------------------------------
    # Properties
    #------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    private $secureKey;

    /**
     * @var string
     */
    private $iv;

    #------------------------------------------------------------------------------------------------------
    # Magic methods
    #------------------------------------------------------------------------------------------------------

    /**
     * AesEncryption constructor.
     *
     * @param string $aesKey security key to use for encryption and decryption
     */
    public function __construct($aesKey)
    {
        $this->secureKey = hash('sha256', $aesKey, true);
        $this->iv = mcrypt_create_iv(32);
    }

    #------------------------------------------------------------------------------------------------------
    # Public methods
    #------------------------------------------------------------------------------------------------------

    /**
     * Encrypt the input
     *
     * @param string $input
     * @return string
     */
    public function encrypt($input)
    {
        return base64_encode(
            mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->secureKey, $input, MCRYPT_MODE_ECB, $this->iv)
        );
    }

    /**
     * Decrypt the input
     *
     * @param string $input
     * @return string
     */
    public function decrypt($input)
    {
        return trim(
            mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->secureKey, base64_decode($input), MCRYPT_MODE_ECB, $this->iv)
        );
    }
}
