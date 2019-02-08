<?php

declare(strict_types=1);

/*
 * This file is part of the Laravel Silent Authentication package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\LaravelSilentAuthentication\Traits;

use Illuminate\Contracts\Auth\Authenticatable;

trait SilentAuthentication
{
    /**
     * Log a user into the application without firing login specific events.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function silentLogin(Authenticatable $user)
    {
        $this->updateSession($user->getAuthIdentifier());

        $this->setUser($user);
    }

    /**
     * Log the user out of the application without refreshing the "remember me"
     * token and firing logout specific events.
     *
     * @return void
     */
    public function silentLogout()
    {
        $this->clearUserDataFromStorage();

        $this->user = null;

        $this->loggedOut = true;
    }
}
