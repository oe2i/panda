<?php

declare(strict_types=1);

namespace App\Livewire\Settings\TwoFactor;

use Exception;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Livewire\Attributes\Locked;
use Livewire\Component;

final class RecoveryCodes extends Component
{
    /** @var list<string> */
    #[Locked]
    public array $recoveryCodes = [];

    /**
     * Load the recovery codes so the user can view them.
     */
    public function viewRecoveryCodes(): void
    {
        $this->loadRecoveryCodes();
    }

    /**
     * Generate new recovery codes for the user.
     */
    public function regenerateRecoveryCodes(GenerateNewRecoveryCodes $generateNewRecoveryCodes): void
    {
        $generateNewRecoveryCodes(auth()->user());

        $this->loadRecoveryCodes();
    }

    /**
     * Load the recovery codes for the user.
     */
    private function loadRecoveryCodes(): void
    {
        $user = auth()->user();

        if ($user === null) {
            return;
        }

        if ($user->hasEnabledTwoFactorAuthentication() && $user->two_factor_recovery_codes) {
            try {
                $decrypted = decrypt($user->two_factor_recovery_codes);
                $decoded = is_string($decrypted) ? json_decode($decrypted, true) : null;
                /** @var list<string> $codes */
                $codes = is_array($decoded) ? array_values(array_filter($decoded, is_string(...))) : [];
                $this->recoveryCodes = $codes;
            } catch (Exception) {
                $this->addError('recoveryCodes', 'Failed to load recovery codes');

                $this->recoveryCodes = [];
            }
        }
    }
}
