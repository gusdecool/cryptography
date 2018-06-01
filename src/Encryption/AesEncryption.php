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

    const CHIPPER = 'AES256';

    /**
     * @var string
     */
    private $secureKey;

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
            openssl_encrypt ($input, self::CHIPPER, $this->secureKey)
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
            openssl_decrypt(base64_decode($input), self::CHIPPER, $this->secureKey)
        );
    }
}
