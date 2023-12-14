<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class SimpleCipher
{
    public string $key;
    private int $keyLen;
    public function __construct(string $key = null)
    {
        if ($key === '') {
            throw new InvalidArgumentException("Key must be at least 1 lowercase alphanumeric character long");
        } else if ($key === null) {
            $rngKey = '';
            for ($i = 0; $i < 100; $i++) {
                $rngKey .= range('a', 'z')[random_int(0,25)];
            }
            $this->key = $rngKey;
            $this->keyLen = strlen($rngKey);
        } else if (!preg_match('/^[a-z]+$/', $key)) {
            throw new InvalidArgumentException("Key must be only lowercase alphanumeric characters");
        } else {
            $this->key = $key;
            $this->keyLen = strlen($key);
        }
    }

    public function encode(string $plainText): string
    {
        $encodedText = '';
        $alphabet = range('a','z');
        for ($i = 0; $i < strlen($plainText); $i++) {
            $originalChar = $plainText[$i];
            $originalOffsetValue = array_search($originalChar, $alphabet);

            //if case key is shorter than the string to be encoded, iterate over key again using modulo:
            $keyChar = $this->key[$i % $this->keyLen];
            $keyOffsetValue = array_search($keyChar, $alphabet);

            $encodedText .= $alphabet[($originalOffsetValue + $keyOffsetValue) % 26];
        }
        return $encodedText;
    }

    public function decode(string $cipherText): string
    {
        $decodedText = '';
        $alphabet = range('a','z');
        for ($i = 0; $i < strlen($cipherText); $i++) {
            $originalChar = $cipherText[$i];
            $originalOffsetValue = array_search($originalChar, $alphabet);

            //if case key is shorter than the string to be encoded, iterate over key again using modulo:
            $keyChar = $this->key[$i % $this->keyLen];
            $keyOffsetValue = array_search($keyChar, $alphabet);

            $decodedText .= $alphabet[(26 + $originalOffsetValue - $keyOffsetValue) % 26];
        }
        return $decodedText;
    }
}
