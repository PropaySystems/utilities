<?php

namespace PropaySystems\Utilities\traits;

use ZxcvbnPhp\Zxcvbn;

trait PasswordStrength
{
    public float $passwordStrength = 0;

    public function updateProgress(): void
    {
        $zxcvbn = new Zxcvbn();
        $score = $zxcvbn->passwordStrength($this->password ?? '');
        $this->passwordStrength = (($score['score'] / 4) * 100);
    }

    public function resetMeter()
    {
        $this->passwordStrength = 0;
    }
}
