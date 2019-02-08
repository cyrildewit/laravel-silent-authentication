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

namespace CyrildeWit\LaravelSilentAuthentication\Guards;

use Illuminate\Auth\SessionGuard as BaseSessionGuard;

class SessionGuard extends BaseSessionGuard
{
    use SilentAuthentication;
}
