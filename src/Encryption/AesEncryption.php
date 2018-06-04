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
    const IV = '\'Nl6P0*3\'Nl6P0*3';

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
    public function __construct(string $aesKey)
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
    public function encrypt(string $input): string
    {
        return base64_encode(
            openssl_encrypt($input, self::CHIPPER, $this->secureKey, 0, self::IV)
        );
    }

    /**
     * Decrypt the input
     *
     * @param string $input
     * @return string
     */
    public function decrypt(string $input): string
    {
        return trim(
            openssl_decrypt(base64_decode($input), self::CHIPPER, $this->secureKey, 0, self::IV)
        );
    }
}
